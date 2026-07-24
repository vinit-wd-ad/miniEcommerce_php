<?php
header('Content-Type: application/json');
include "../../setting.php";

// Read and decode JSON payload from input stream
$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

// Extract registration fields from JSON body
$name     = isset($data['name']) ? trim($data['name']) : null;
$email    = isset($data['email']) ? trim($data['email']) : null;
$password = isset($data['password']) ? $data['password'] : null;

// Validate required fields
if (!empty($name) && !empty($email) && !empty($password)) {

    // Prepare payload for main registration API
    $postData = [
        'name'     => $name,
        'email'    => $email,
        'password' => $password
    ];

    // Call external backend API for registration
    $apiResponse = callApi('user/new', 'POST', $postData);

    // Check if registration was successful
    if (isset($apiResponse['status']) && ($apiResponse['status'] === true || $apiResponse['status'] === 'success')) {

        // Auto-login: Store session variables if API returns user & token on registration
        $_SESSION['auth_token']   = $apiResponse['token'] ?? null;
        $_SESSION['user']         = $apiResponse['user'] ?? null;
        $_SESSION['user_id']      = $apiResponse['user']['id'] ?? null;
        $_SESSION['is_logged_in'] = true;

        // Initialize user cart session structure
        if (!isset($_SESSION['user_cart'])) {
            $_SESSION['user_cart'] = [
                'user_id'    => $_SESSION['user_id'],
                'cart_items' => []
            ];
        } else {
            $_SESSION['user_cart']['user_id'] = $_SESSION['user_id'];
        }

        // Return success response to frontend
        http_response_code(201); // 201 Created
        echo json_encode([
            'status'  => 'success',
            'message' => $apiResponse['message'] ?? 'Registration successful',
            'user'    => $_SESSION['user'],
            'token'   => $_SESSION['auth_token']
        ]);

    } else {
        // Handle validation or creation errors from backend API
        http_response_code(422); // Unprocessable Entity / Bad Request
        echo json_encode([
            'status'  => 'error',
            'message' => $apiResponse['message'] ?? 'Registration failed. Please try again.'
        ]);
    }

} else {
    // Handle missing payload fields
    http_response_code(400);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Name, Email, and Password are required fields.'
    ]);
}
exit;