<div class="product-area pb-70">
    <div class="container">
        <div class="section-wrap-1">
            <div class="section-title-deal-wrap mb-30">
                <div class="section-title-8">
                    <h2>deals of the day</h2>
                </div>
                <div class="timer-wrap-2 timer-wrap-2-hm10">
                    <h4><i class="icon-speedometer"></i> Expires in:</h4>
                    <div class="timer-style-2" id="timer-2-active"></div>
                </div>
            </div>
            <div
                class="product-slider-active-8 dot-style-2 dot-style-2-position-static dot-style-2-mrg-3 nav-style-5 nav-style-5-modify">
                <?php
                if (!empty($products)) {
                    foreach ($products['data'] as $product) {
                        // print_r($product)
                        ?>
                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-zoom mb-20">
                                    <a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>">
                                        <img src="<?= API_URL . $product['image'] ?>" alt="">
                                    </a>
                                    <!-- <span class="pro-badge left bg-red">-40%</span> -->
                                    <div class="product-action-2">
                                        <button title="Wishlist"><i class="icon-heart"></i></button>
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="icon-size-fullscreen icons"></i></button>
                                        <button title="Compare"><i class="icon-refresh"></i></button>
                                    </div>
                                </div>
                                <div class="product-content-wrap-3">
                                    <h3 class="mrg-none"><a class="orange" href="product-details.php"><?= $product['name'] ?></a>
                                    </h3>
                                    <div class="product-rating-wrap-2">
                                        <div class="product-rating-4">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        </div>
                                        <span>(4)</span>
                                    </div>
                                    <div class="product-price-4">
                                        <span class="new-price">Rs:<?= $product['price'] ?></span>
                                        <span class="old-price">Rs:<?= $product['price'] + 100 ?></span>
                                    </div>
                                    <!-- <div class="product-author">
                                        <span>Seller: <a class="orange" href="#">olabear.com</a></span>
                                    </div>
                                    <div class="product-sold">
                                        <div class="single-product-sold">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-width70 wow fadeInLeft"
                                                    data-progress="90%" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                                </div>
                                            </div>
                                            <span>Sold: 245/320 </span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec">
                                    <h3 class="mrg-none"><a class="orange" href="product-details.php"><?= $product['name'] ?></a>
                                    </h3>
                                    <div class="product-rating-wrap-2">
                                        <div class="product-rating-4">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        </div>
                                        <span>(4)</span>
                                    </div>
                                    <div class="product-price-4">
                                        <span class="new-price">Rs:<?= $product['price'] ?></span>
                                        <span class="old-price">Rs:<?= $product['price'] + 100 ?></span>
                                    </div>
                                    <!-- <div class="product-author">
                                        <span>Seller: <a class="orange" href="#">olabear.com</a></span>
                                    </div>
                                    <div class="product-sold">
                                        <div class="single-product-sold">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-width70 wow fadeInLeft"
                                                    data-progress="90%" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                                </div>
                                            </div>
                                            <span>Sold: 245/320 </span>
                                        </div>
                                    </div> -->
                                    <div class="pro-add-to-cart-2">
                                        <button title="Add to Cart">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>