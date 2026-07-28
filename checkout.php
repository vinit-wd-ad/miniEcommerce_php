<?php
include_once "setting.php";

// Read active cart items from Session
$cartItems = $_SESSION['user_cart']['cart_items'] ?? [];

// Fetch cart summary details from Laravel API
$apiResponse = callApi('v1/cart/details', 'POST', [
    'cart_items' => $cartItems
]);

$cartDetails = $apiResponse['data'] ?? [
    'items' => [],
    'subtotal' => 0,
    'total_items' => 0
];

$items = $cartDetails['items'] ?? [];
$subtotal = $cartDetails['subtotal'] ?? 0;
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
                        <li class="active">Checkout </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="checkout-main-area pt-50 pb-50">
            <div class="container">
                <div class="checkout-wrap pt-30">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap mr-50">
                                <h3>Shipping Address</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>First Name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="billing-select mb-20">
                                            <label>Country <abbr class="required" title="required">*</abbr></label>
                                            <select>
                                                <option>Select a country</option>
                                                <option selected>India</option>
                                                <option value="">Chaina</option>
                                                <option value="">Nepal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="billing-info mb-20">
                                            <label>State <abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="billing-info mb-20">
                                            <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="billing-info mb-20">
                                            <label>Postcode / ZIP <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Street Address <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input class="billing-address" placeholder="House number and street name"
                                                type="text">
                                            <input placeholder="Apartment, suite, unit etc." type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Phone <abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Email Address <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="additional-info-wrap">
                                    <label>Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                        name="message" class="border"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn-2 mt-4" type="submit">Add Address</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li>Product <span>Total</span></li>
                                            </ul>
                                        </div>

                                        <!-- Dynamic Cart Items List -->
                                        <div class="your-order-middle">
                                            <ul>
                                                <?php if (!empty($items)): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <li>
                                                            <?= htmlspecialchars($item['name']) ?> <strong>X
                                                                <?= $item['quantity'] ?></strong>
                                                            <span>₹<?= number_format($item['item_total'], 2) ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li>Your cart is empty! <span>₹0.00</span></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <!-- Subtotal Summary -->
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li>Subtotal <span>₹<?= number_format($subtotal, 2) ?></span></li>
                                            </ul>
                                        </div>

                                        <!-- Shipping Summary -->
                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li>Shipping <p>Free Shipping</p>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Grand Total -->
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>Total <span>₹<?= number_format($subtotal, 2) ?></span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Payment Methods -->
                                    <div class="payment-method">
                                        <div class="pay-top sin-payment">
                                            <input id="payment_method_1" class="input-radio" type="radio" value="cod"
                                                checked="checked" name="payment_method">
                                            <label for="payment_method_1"> Cash on Delivery </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Pay with cash upon delivery of your order.</p>
                                            </div>
                                        </div>

                                        <div class="pay-top sin-payment">
                                            <input id="payment_method_2" class="input-radio" type="radio" value="online"
                                                name="payment_method">
                                            <label for="payment_method_2"> Online Payment / UPI </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Pay securely via Credit/Debit Card, Netbanking, or UPI gateway.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Place Order Button -->
                                <div class="Place-order">
                                    <?php if (!empty($items)): ?>
                                        <button class="btn-2 w-100">Place
                                            Order</button>
                                    <?php else: ?>
                                        <a href="shop.php" class="btn w-100 text-white"
                                            style="background-color: #6c757d; padding: 15px;">Add Items to Checkout</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "components/subscribe-area.php" ?>

        <?php include "includes/footer.php"; ?>

    </div>

    <?php include "includes/script.php"; ?>
</body>

</html>