<?php
if (!empty($relatedProducts)) {
?>
    <div class="related-product pb-115">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <h2>Related Product</h2>
            </div>
            <div class="related-product-active">
                <?php
                foreach ($relatedProducts['data'] as $product) {
                ?>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>">
                                    <img src="<?= API_URL . $product['image'] ?>" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <h3><a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>"><?= $product['name'] ?></a></h3>
                                <div class="product-price-2">
                                    <span>₹<?= $product['price'] ?></span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <h3><a href="<?= BASE_URL ?>product-details/<?= $product['slug'] ?>"><?= $product['name'] ?></a></h3>
                                <div class="product-price-2">
                                    <span>₹<?= $product['price'] ?></span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>