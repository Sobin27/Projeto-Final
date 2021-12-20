<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = "mvc-crudtest";
$payload = array(
    "iss" => "localhost:8000/logado",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);

$jwt = JWT::encode($payload, $key, 'HS256');
$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

print_r($decoded);


$decoded_array = (array) $decoded;

JWT::$leeway = 60; 
$decoded = JWT::decode($jwt, new Key($key, 'HS256'));
