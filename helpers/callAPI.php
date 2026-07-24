<?php

/**
 * Reusable function to call any API (GET, POST, PUT, DELETE)
 * @param string $slug API URL
 * @param string $method GET, POST, PUT, DELETE (Default: GET)
 * @param array $data Request Body (POST/PUT ke liye array)
 * @param array $headers Custom Headers (Token wagera ke liye)
 * @return mixed Decoded JSON response ya false
 */
function callApi($slug, $method = 'GET', $data = [], $headers = [])
{
    $url = API_ROOT . $slug;
    $ch = curl_init();

    $defaultHeaders = [
        "Content-Type: application/json",
        "Accept: application/json"
    ];

    $headers = array_merge($defaultHeaders, $headers);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    // SSL Issues Bypass karne ke liye
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
    // Timeout set karein (5 seconds)
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $method = strtoupper($method);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    } elseif (in_array($method, ['PUT', 'DELETE', 'PATCH'])) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    $response = curl_exec($ch);

    // Error catching
    if (curl_errno($ch)) {
        echo "cURL Error on URL ($url): " . curl_error($ch);
        curl_close($ch);
        die();
    }

    curl_close($ch);
    return json_decode($response, true);
}
