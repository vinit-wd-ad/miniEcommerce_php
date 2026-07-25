<?php

/**
 * Reusable function to fetch data from any GET API endpoint
 * 
 * @param string $slug The API endpoint slug
 * @param array $headers Optional custom headers (e.g., Authorization tokens)
 * @return mixed Decoded JSON array response on success, or false on failure
 */
function fetchApi($slug, $headers = [])
{
    $url = API_ROOT . 'v1/' . $slug;
    $ch = curl_init();

    // Set default headers if none are provided
    if (empty($headers)) {
        $headers = [
            "Content-Type: application/json",
            "Accept: application/json"
        ];
    }

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Bypass SSL certificate verification for local/development environments
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    // Set connection timeout (10 seconds)
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }

    // Close the cURL session
    curl_close($ch);

    // Decode and return the JSON response as an associative array
    return json_decode($response, true);
}