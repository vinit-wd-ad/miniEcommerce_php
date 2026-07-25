<?php
session_start();

define('BASE_URL', 'http://local.php/miniEcommerce/');
define('BASE_PATH', __DIR__ . '/');
define('API_ROOT', 'https://vinit.convertfileplus.com/api/');
define('API_URL', 'https://vinit.convertfileplus.com/storage/');
// define('API_ROOT', 'https://vecommerce.up.railway.app/api/v1/');
// define('API_URL', 'https://vecommerce.up.railway.app/storage/');

require_once "helpers/fetchAPI.php";    
require_once "helpers/callAPI.php";    

$webSettings = fetchApi('settings');
$webSetting = $webSettings['data'] ?? [];

$categories = fetchApi('categories');

$heroBanners = fetchApi('banners/hero_banner/type');

$products = fetchApi('products');

$catProducts = fetchApi('categories-products');