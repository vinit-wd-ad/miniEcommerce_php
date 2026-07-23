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

    // Default Headers
    $defaultHeaders = [
        "Content-Type: application/json",
        "Accept: application/json"
    ];

    // Merge custom headers if provided
    $headers = array_merge($defaultHeaders, $headers);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // HTTP Method Selection
    $method = strtoupper($method);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    } elseif (in_array($method, ['PUT', 'DELETE', 'PATCH'])) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }

    curl_close($ch);
    return json_decode($response, true);
}
