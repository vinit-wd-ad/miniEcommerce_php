<?php
if (!empty($catProducts)) {
    foreach ($catProducts['data'] as $catProduct) {
        if (!empty($catProduct['products'])) {
            ?>
            <div class="banner-product-wrap pb-70">
                <div class="container">
                    <div class="section-wrap-3">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-wrap h-100">
                                    <div class="banner-img banner-img-zoom">
                                        <a href="product-details.php"><img src="<?= API_URL . $catProduct['image'] ?>" alt=""></a>
                                    </div>
                                    <div class="banner-content-23 text-center">
                                        <!-- <div class="banner-content-23-top">
                                            <p>cyber<br>monday<br>sale</p>
                                            <h2><span>50%</span> OFF <br><?= $catProduct['name'] ?></h2>
                                        </div> -->
                                        <div class="banner-btn-3 w-100">
                                            <a href="product-details.php" class="w-100 bg-dark">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="product-area product-area-padding">
                                    <div class="section-title-btn-wrap mb-25">
                                        <div class="section-title-8">
                                            <h2><?= $catProduct['name'] ?></h2>
                                        </div>
                                    </div>
                                    <div class="tab-content jump">
                                        <!-- <div id="product-9" class="tab-pane active"> -->
                                        <div
                                            class="product-slider-active-9 dot-style-2 dot-style-2-position-static dot-style-2-mrg-4">
                                            <?php
                                            foreach ($catProduct['products'] as $product) {
                                                ?>
                                                <div class="product-plr-1">
                                                    <div class="single-product-wrap">
                                                        <div class="product-img product-img-zoom mb-15">
                                                            <a href="product-details.php">
                                                                <img src="<?= API_URL . $product['image'] ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product-content-wrap-3">
                                                            <h3 class="mrg-none bold">
                                                                <a class="orange" href="product-details.php"><?= $product['name'] ?></a>
                                                            </h3>
                                                            <div class="product-price-4 product-price-4-hm10">
                                                                <span>Rs:<?= $product['price'] ?></span>
                                                            </div>
                                                            <!-- <div class="product-author">
                                                                <span>Seller: <a class="orange" href="#">USoffice</a></span>
                                                            </div> -->
                                                        </div>
                                                        <div
                                                            class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec">
                                                            <h3 class="mrg-none bold">
                                                                <a class="orange" href="product-details.php"><?= $product['name'] ?></a>
                                                            </h3>
                                                            <div class="product-price-4 product-price-4-hm10">
                                                                <span>Rs:<?= $product['price'] ?></span>
                                                            </div>
                                                            <!-- <div class="product-author">
                                                                <span>Seller: <a class="orange" href="#">USoffice</a></span>
                                                            </div> -->
                                                            <div class="pro-add-to-cart-2">
                                                                <button title="Add to Cart">Add To Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    }
}
?>