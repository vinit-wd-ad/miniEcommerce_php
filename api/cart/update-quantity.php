<?php
header('Content-Type: application/json');
include "../../setting.php";

$input = json_decode(file_get_contents('php://input'), true);

$productId = $input['product_id'] ?? null;
$quantity  = (int)($input['quantity'] ?? 0);

if (!$productId || $quantity < 1) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid product or quantity'
    ]);
    exit();
}

// Direct check (no loop needed)
if (isset($_SESSION['user_cart']['cart_items'][$productId])) {

    // Update quantity directly
    $_SESSION['user_cart']['cart_items'][$productId]['quantity'] = $quantity;

    echo json_encode([
        'status' => 'success',
        'message' => 'Quantity updated successfully'
    ]);

} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Product not found in cart'
    ]);
}