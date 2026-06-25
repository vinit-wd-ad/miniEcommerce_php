<?php
    include "setting.php"
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include "includes/head.php"; ?>
    <title>Shop | Minimal eCommerce</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
</head>

<body>

    <div class="main-wrapper">

        <?php include "includes/header.php" ?>

        <?php include "includes/sidebar-cart.php" ?>

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Shop </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="shop-area pt-120 pb-120">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <div class="view-mode nav">
                                    <a class="active" href="#shop-1" data-bs-toggle="tab"><i class="icon-grid"></i></a>
                                </div>
                                <p>Showing 1 - 20 of 30 results </p>
                            </div>
                            <div class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>View :</label>
                                    <select>
                                        <option value=""> 20</option>
                                        <option value=""> 23</option>
                                        <option value=""> 30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <?php include "components/shop-products-grid.php" ?>
                                </div>
                            </div>
                            <div class="pro-pagination-style text-center mt-10">
                                <ul>
                                    <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?php include "components/shop-sidebar.php" ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include "components/subscribe-area.php" ?>
       
        <?php include "includes/footer.php" ?>
        

        <?php include "components/modals.php" ?>
    </div>

    <!-- All JS is here
============================================ -->

    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="assets/js/vendor/jquery-v3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-v3.3.2.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/sticky-sidebar.js"></script>
    <script src="assets/js/plugins/easyzoom.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>