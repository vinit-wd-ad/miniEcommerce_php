<?php
header('Content-Type: application/json');
include "../../setting.php";

// Initialize cart if not exists
if (!isset($_SESSION['user_cart'])) {
    $_SESSION['user_cart'] = [
        'user_id' => $_SESSION['user_id'] ?? null,
        'cart_items' => [] // अब associative array होगा
    ];
}

$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

$productId = $data['product_id'] ?? null;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 1;

if ($productId) {
    $apiResponse = fetchApi('products/' . $productId);
    $product = $apiResponse['data'] ?? null;

    if ($product) {

        // Check if product already exists
        if (isset($_SESSION['user_cart']['cart_items'][$productId])) {

            // Update quantity
            $_SESSION['user_cart']['cart_items'][$productId]['quantity'] += $quantity;
        } else {

            // Add new item (product_id as key)
            $_SESSION['user_cart']['cart_items'][$productId] = [
                'item_id' => count($_SESSION['user_cart']['cart_items']) + 1,
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        echo json_encode([
            'status' => 'success',
            'message' => 'Item added to cart',
            'user_cart' => $_SESSION['user_cart']
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Product not found'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid Product ID'
    ]);
}
exit;
