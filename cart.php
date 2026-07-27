<?php
include "setting.php";
// Read cart items from your active Session
$cartItems = $_SESSION['user_cart']['cart_items'] ?? [];

// Hit Laravel API in a single POST request
$apiResponse = callApi('v1/cart/details', 'POST', [
    'cart_items' => $cartItems
]);

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <title>Minimal eCommerce</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
</head>

<body>

    <div class="main-wrapper">

        <?php include "includes/header.php"; ?>

        <?php include "includes/sidebar-cart.php"; ?>

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="<?= BASE_URL ?>">Home</a>
                        </li>
                        <li class="active">Cart Page </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php
        // echo "<pre>";
        // print_r($apiResponse);
        // echo "</pre>";
        ?>

        <?php

        $cartDetails = $apiResponse['data'] ?? [
            'items'       => [],
            'subtotal'    => 0,
            'total_items' => 0
        ];

        $items = $cartDetails['items'] ?? [];
        $subtotal = $cartDetails['subtotal'] ?? 0;
        ?>

        <div class="cart-main-area pt-60 pb-60">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($items)): ?>
                                        <?php foreach ($items as $item): ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="product-details/<?= $item['slug'] ?>">
                                                        <img src="<?= htmlspecialchars($item['image']) ?>"
                                                            alt="<?= htmlspecialchars($item['name']) ?>"
                                                            style="width: 80px; height: auto;">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="product-details.php/<?= $item['slug'] ?>">
                                                        <?= htmlspecialchars($item['name']) ?>
                                                    </a>
                                                </td>
                                                <td class="product-price-cart">
                                                    <span class="amount">₹<?= number_format($item['unit_price'] ?? $item['price'], 2) ?></span>
                                                </td>
                                                <td class="product-quantity pro-details-quality">
                                                    <div class="cart-plus-minus">
                                                        <div class="dec qtybutton">-</div>
                                                        <input class="cart-plus-minus-box"
                                                            type="text"
                                                            name="qty[<?= $item['product_id'] ?>]"
                                                            value="<?= $item['quantity'] ?>"
                                                            data-product-id="<?= $item['product_id'] ?>" readonly>
                                                        <div class="inc qtybutton">+</div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    ₹<?= number_format($item['item_total'], 2) ?>
                                                </td>
                                                <td class="product-remove">
                                                    <button class="border-0 remove-product" data-product-id="<?= $item['product_id'] ?>">
                                                        <i class="icon_close"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <h4>Your cart is empty!</h4>
                                                <a href="shop.php" class="btn btn-primary mt-3">Continue Shopping</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if (!empty($items)): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="shop.php">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="cart-clear.php" onclick="return confirm('Clear entire cart?')">Clear Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($items)): ?>
                            <div class="row mt-4">

                                <!-- Coupon Code Area -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                        </div>
                                        <div class="discount-code">
                                            <p>Enter your coupon code if you have one.</p>
                                            <form action="apply-coupon.php" method="POST">
                                                <input type="text" required="" name="coupon_code">
                                                <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cart Grand Total Summary -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                        <h5>Subtotal <span>₹<?= number_format($subtotal, 2) ?></span></h5>
                                        <div class="total-shipping">
                                            <h5>Total shipping</h5>
                                            <ul>
                                                <li><input type="checkbox" checked disabled> Standard <span>Free</span></li>
                                            </ul>
                                        </div>
                                        <h4 class="grand-totall-title">Grand Total <span>₹<?= number_format($subtotal, 2) ?></span></h4>
                                        <a href="checkout.php">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <?php include "components/subscribe-area.php" ?>

        <?php include "includes/footer.php"; ?>
    </div>

    <?php include  "includes/script.php"; ?>

</body>

</html>