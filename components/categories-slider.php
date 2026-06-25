<?php
$categories = isset($categories) ? $categories : [];
?>

<?php
if (!empty($categories)) {
    ?>
    <div class="product-categories-area pt-70 pb-70">
        <div class="container">
            <div class="section-title-btn-wrap mb-25">
                <div class="section-title-8">
                    <h2>Popular Categories</h2>
                </div>
                <div class="btn-style-9">
                    <a href="shop.html">All Product</a>
                </div>
            </div>
            <div class="section-wrap-1">
                <div class="product-categories-slider-1 nav-style-3">
                    <?php
                    if (!empty($categories) && $categories['data']) {
                        foreach ($categories['data'] as $category) {
                            ?>
                            <div class="product-plr-1">
                                <div class="single-product-wrap">
                                    <div class="product-img product-img-border-transparent mb-15">
                                        <a href="">
                                            <img src="<?= API_URL . $category['image'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content-categories-2 product-content-orange text-center">
                                        <h5 class="font-width-dec"><a href=""><?= $category['name'] ?></a></h5>
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

<?php } ?>