<?php
header('Content-Type: application/json');
include "../setting.php";

$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

$productId = isset($data['product_id']) ? $data['product_id'] : null;
$quantity = isset($data['quantity']) ? $data['quantity'] : 1;

if ($productId) {
    $productUrl = API_ROOT . 'products/' . $productId;
    $product = fetchApi($productUrl)['data'];

    echo json_encode([
        'status' => 'success',
        'message' => 'Item added to cart',
        'product' => $product,
        'quantity' => $quantity
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid Product ID'
    ]);
}
exit;
?>