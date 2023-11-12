<?php
require_once __DIR__ . '/../vendor/autoload.php';
session_start();

$appUrl = '';
$clientId = '';
$clientSecret = '';

$config = new Milo\Github\OAuth\Configuration($clientId, $clientSecret, ['user', 'repos']);
$storage = new Milo\Github\Storages\SessionStorage;
$login = new Milo\Github\OAuth\Login($config,$storage);
$api = new Milo\Github\Api;

if ($login->hasToken()){
    $token = $login->getToken();
    $api->setToken($token);
} else {
    if (isset($_GET['redirect'])){
        $login->obtainToken($_GET['code'], $_GET['state']);
        header("location: " . filter_input(INPUT_GET, 'redirect'));
        exit();
    } else {
        $login->askPermissions("$appUrl/inc/authenticated.php?redirect=" .$_SERVER['REQUEST_URL']);
    }
}



?>