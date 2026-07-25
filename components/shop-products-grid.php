<?php

$productUrl = 'products';
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $productUrl = 'products/' . $slug . '/category';
}

$products = fetchApi($productUrl);

?>

<div class="row">
    <?php
    if (!empty($products)) {
        foreach ($products['data'] as $product) {
    ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-product-wrap mb-35">
                    <div class="product-img product-img-zoom mb-15">
                        <a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>">
                            <img src="<?= API_URL . $product['image'] ?>" alt="">
                        </a>
                        <!-- <span class="pro-badge left bg-red">-20%</span> -->
                        <div class="product-action-2 tooltip-style-2">
                            <button title="Wishlist"><i class="icon-heart"></i></button>
                            <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                            <button title="Compare"><i class="icon-refresh"></i></button>
                        </div>
                    </div>
                    <div class="product-content-wrap-2 text-center">
                        <h3><a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>"><?= $product['name'] ?></a></h3>
                        <div class="product-price-2">
                            <span class="new-price">₹<?= $product['price'] ?></span>
                            <span class="old-price">₹<?= $product['price'] + 100 ?></span>
                        </div>
                    </div>
                    <div class="product-content-wrap-2 product-content-position text-center">
                        <h3><a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>"><?= $product['name'] ?></a></h3>
                        <div class="product-price-2">
                            <span class="new-price">₹<?= $product['price'] ?></span>
                            <span class="old-price">₹<?= $product['price'] + 100 ?></span>
                        </div>
                        <div class="pro-add-to-cart">
                            <button title="Add to Cart">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
    <?php

        }
    }
    ?>
    <?php if (empty($products['data'])) { ?>
        <div class="col-12">
            <div class="alert alert-warning text-center">
                Product Not Found
            </div>
        </div>
    <?php } ?>
</div>