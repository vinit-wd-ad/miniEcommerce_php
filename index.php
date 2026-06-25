<?php
    include "setting.php"
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <title><?= $webSetting['site_tagline'] ?? '' ?></title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
</head>

<body>

    <div class="main-wrapper bg-gray-9">

        <?php include "includes/header.php"; ?>

        <?php include "includes/sidebar-cart.php"; ?>

        <?php include "components/hero-slider-one.php" ?>

        <?php include "components/categories-slider.php" ?>

        <?php include "components/offer-banners.php" ?>

        <?php include "components/products-slider.php" ?>

        <?php include "components/banner-product-slider.php" ?>

        <?php include "components/blogs-grid-3x1.php" ?>

        <?php include "components/download-app-area.php" ?>

        <?php include "components/subscribe-area.php" ?>

        <?php include "includes/footer.php"; ?>

        <?php include "components/modals.php" ?>

    </div>

    <?php include  "includes/script.php"; ?>

</body>

</html>