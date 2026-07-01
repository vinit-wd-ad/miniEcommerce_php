<?php

define('BASE_URL', 'http://local.php/miniEcommerce/');
define('BASE_PATH', __DIR__ . '/');
define('API_ROOT', 'http://127.0.0.1:8000/api/v1/');
define('API_URL', 'http://127.0.0.1:8000/storage/');
// define('API_ROOT', 'https://vecommerce.up.railway.app/api/v1/');
// define('API_URL', 'https://vecommerce.up.railway.app/storage/');

require_once "helpers/fetchAPI.php";

$settingUrl = API_ROOT . 'settings';
$webSettings = fetchApi($settingUrl);
$webSetting = $webSettings['data'] ?? [];

$categoryUrl = API_ROOT . 'categories';
$categories = fetchApi($categoryUrl);

$heroBannerUrl = API_ROOT . 'banners/hero_banner/type';
$heroBanners = fetchApi($heroBannerUrl);

$productUrl = API_ROOT . 'products';
$products = fetchApi($productUrl);

$catProductUrl = API_ROOT . 'categories-products';
$catProducts = fetchApi($catProductUrl);