<?php
header('Content-Type: application/json');
include "../../setting.php";

// Get raw JSON payload from JS request
$input = json_decode(file_get_contents('php://input'), true);

$productId = $input['product_id'] ?? null;

if (!$productId) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid product'
    ]);
    exit();
}

if (isset($_SESSION['user_cart']['cart_items'][$productId])) {

    unset($_SESSION['user_cart']['cart_items'][$productId]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Product removed successfully'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Product not found in cart'
    ]);
}
