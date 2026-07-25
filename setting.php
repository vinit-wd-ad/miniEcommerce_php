<?php
session_start();

define('BASE_PATH', __DIR__ . '/');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
define('BASE_URL', $protocol . $host . $scriptDir . '/');

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