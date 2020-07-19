#!/usr/bin/env php
<?php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$token_generado = [
  'username' => 'i2dtechnik',
  'timestamp' => '123456'
  ];

// This is your client secret
$key = '__test_secret__';

// This is your id token
$jwt = JWT::encode($token_generado, base64_decode(strtr($key, '-_', '+/')), 'HS256');
print($jwt."\n");
print "JWT:\n";
print_r($jwt);
$decoded = JWT::decode($jwt, base64_decode(strtr($key, '-_', '+/')), ['HS256']);

print "\n\n";
print "Decoded:\n";
print_r($decoded);
print($decoded);
?>
