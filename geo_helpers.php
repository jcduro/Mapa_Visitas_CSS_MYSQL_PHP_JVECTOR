<?php

function getUserIP() {
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ipList[0]);
    }
    return $_SERVER['REMOTE_ADDR'];
}

function getCountryByIP($ip) {
    // API gratuita que devuelve el país por IP
    $url = "https://api.country.is/" . $ip;
    $json = @file_get_contents($url);
    if (!$json) return null;

    $data = json_decode($json, true);
    // Ejemplo de respuesta: {"ip":"x.x.x.x","country":"CO"}
    return $data['country'] ?? null; // devuelve "CO", "US", etc.
}
