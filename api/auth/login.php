<?php
header('Content-Type: application/json');
include "../../setting.php";

// Read and decode JSON payload from input stream
$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

// Extract credentials matching frontend payload keys
$userName = isset($data['user-name']) ? trim($data['user-name']) : null;
$userPassword = isset($data['user-password']) ? $data['user-password'] : null;

if (!empty($userName) && !empty($userPassword)) {

    // Prepare payload for external backend API
    $postData = [
        'email'    => $userName,
        'password' => $userPassword
    ];

    // Execute authentication request to main API
    $apiResponse = callApi('user/login', 'POST', $postData);

    // Validate API authentication status
    if (isset($apiResponse['status']) && ($apiResponse['status'] === true || $apiResponse['status'] === 'success')) {

        // Store authentication token and user profile in active session
        $_SESSION['auth_token']   = $apiResponse['token'] ?? null;
        $_SESSION['user']         = $apiResponse['user'] ?? null;
        $_SESSION['user_id']      = $apiResponse['user']['id'] ?? null;
        $_SESSION['is_logged_in'] = true;

        // Ensure user cart structure is bound to the logged-in user
        if (!isset($_SESSION['user_cart'])) {
            $_SESSION['user_cart'] = [
                'user_id'    => $_SESSION['user_id'],
                'cart_items' => []
            ];
        } else {
            $_SESSION['user_cart']['user_id'] = $_SESSION['user_id'];
        }

        // Return success payload to frontend
        echo json_encode([
            'status'  => 'success',
            'message' => $apiResponse['message'] ?? 'Login successful',
            'user'    => $_SESSION['user'],
            'token'   => $_SESSION['auth_token']
        ]);

    } else {
        // Handle invalid credentials returned by external API
        http_response_code(401);
        echo json_encode([
            'status'  => 'error',
            'message' => $apiResponse['message'] ?? 'Invalid credentials'
        ]);
    }

} else {
    // Handle missing required payload fields
    http_response_code(400);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Username and Password are required'
    ]);
}
exit;