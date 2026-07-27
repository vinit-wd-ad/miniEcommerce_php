<?php
header('Content-Type: application/json');
include "../../setting.php";

// Initialize response structure
$cartDetails = [
    'items'       => [],
    'subtotal'    => 0,
    'total_items' => 0
];

// Check if cart exists
if (isset($_SESSION['user_cart']['cart_items']) && !empty($_SESSION['user_cart']['cart_items'])) {

    foreach ($_SESSION['user_cart']['cart_items'] as $productId => $cartItem) {

        $quantity = $cartItem['quantity'];

        // Fetch product details
        $apiResponse = fetchApi('products/' . $productId, 'GET');
        $product = $apiResponse['data'] ?? null;

        if ($product) {
            $price = $product['price'] ?? 0;
            $itemTotal = $price * $quantity;

            $cartDetails['items'][] = [
                'item_id'      => $cartItem['item_id'],
                'product_id'   => $productId,
                'name'         => $product['name'] ?? 'Unknown Product',
                'image'        => $product['image'] ?? 'default.jpg',
                'price'        => $price,
                'quantity'     => $quantity,
                'item_total'   => $itemTotal
            ];

            $cartDetails['subtotal'] += $itemTotal;
            $cartDetails['total_items'] += $quantity;
        }
    }
}

// Response
echo json_encode([
    'status' => 'success',
    'data'   => $cartDetails
]);
exit;
