<?php
session_start();

define('BASE_URL', 'http://local.root.com/php-code/miniEcommerce/');
define('BASE_PATH', __DIR__ . '/');
define('API_ROOT', 'https://vinit.convertfileplus.com/api/v1/');
define('API_URL', 'https://vinit.convertfileplus.com/storage/');
// define('API_ROOT', 'https://vecommerce.up.railway.app/api/v1/');
// define('API_URL', 'https://vecommerce.up.railway.app/storage/');

require_once "helpers/fetchAPI.php";    
require_once "helpers/callAPI.php";    

$webSettings = callApi('settings');
$webSetting = $webSettings['data'] ?? [];

$categories = callApi('categories');

$heroBanners = callApi('banners/hero_banner/type');

$products = callApi('products');

$catProducts = callApi('categories-products');