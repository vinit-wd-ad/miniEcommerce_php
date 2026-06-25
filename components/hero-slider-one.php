<div class="slider-area bg-gray-10">
    <div class="container">
        <div class="hero-slider-active-2 nav-style-1 nav-style-1-modify-2 nav-style-1-orange">
            <?php
            if (!empty($heroBanners)) {
                foreach ($heroBanners['data'] as $heroBanner) {

                    ?>
                    <div class="single-hero-slider single-hero-slider-hm10 single-animation-wrap">
                        <div class="row slider-animated-1">
                            <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                                <div class="hero-slider-content-6 slider-content-hm9 slider-content-hm10">
                                    <h5 class="animated">Best Seller</h5>
                                    <h1 class="animated">
                                        <?= $heroBanner['title'] ?>
                                    </h1>
                                    <p class="animated">Prodctect your house with home secure wifi camere indoor/outdoor</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-4 btn-1-orange btn-1-font-14"
                                            href="product-details.php">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 col-sm-12">
                                <div class="hm10-hero-slider-img">
                                    <img class="animated" src="<?= API_URL . $heroBanner['image'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
            <!-- <d
             
                <div class="row slider-animated-1">
                    <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                        <div class="hero-slider-content-6 slider-content-hm9 slider-content-hm10">
                            <h5 class="animated">Best Seller</h5>
                            <h1 class="animated">new ipad pro <br>& phone x</h1>
                            <p class="animated">Prodctect your house with home secure wifi camere indoor/outdoor</p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-4 btn-1-orange btn-1-font-14" href="product-details.php">Explore Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 col-sm-12">
                        <div class="hm10-hero-slider-img">
                            <img class="animated" src="assets/images/slider/hm-10-slider-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>