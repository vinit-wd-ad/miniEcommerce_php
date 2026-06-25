<?php

/**
 * Reusable function to call any API
 * @param string $url API ka URL
 * @param array $headers Agar koi extra headers ya token bhejna ho
 * @return mixed decoded JSON array ya false
 */

function fetchApi($url, $headers = [])
{
    $ch = curl_init();

    if (empty($headers)) {
        $headers = [
            "Content-Type: application/json"
        ];
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        return false;
    }

    $data = json_decode($response, true);
    curl_close($ch);
    return $data;
}
