<?php
header('Content-Type: application/json');
include "../../setting.php";

// Initialize 'user_cart' session structure if it does not exist
if (!isset($_SESSION['user_cart'])) {
    $_SESSION['user_cart'] = [
        'user_id' => $_SESSION['user_id'] ?? null,
        'cart_items' => []
    ];
}

$jsonInput = file_get_contents('php://input');
$data = json_decode($jsonInput, true);

$productId = isset($data['product_id']) ? $data['product_id'] : null;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 1;

if ($productId) {
    $apiResponse = fetchApi('products/' . $productId);
    $product = $apiResponse['data'] ?? null;

    if ($product) {
        $itemId = count($_SESSION['user_cart']['cart_items']) + 1;
        $itemExists = false;

        // Check if the product already exists in the cart, then update quantity
        foreach ($_SESSION['user_cart']['cart_items'] as &$item) {
            if ($item['product_id'] == $productId) {
                $item['quantity'] += $quantity;
                $itemExists = true;
                break;
            }
        }
        unset($item); // Break reference variable

        // If product does not exist in cart, push a new item
        if (!$itemExists) {
            $_SESSION['user_cart']['cart_items'][] = [
                'item_id' => $itemId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        // Return JSON response matching the required structure
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
?>