<?php

require_once 'vendor/autoload.php';

if ($argc <= 1) {
    echo "Usage: {$argv[0]} template";
    exit(1);
}

$template = $argv[1];
$config = @include "templates/{$template}.conf.php";
if (!$config) {
    echo "Config file templates/{$template}.conf.php not found";
    exit(1);
}

$loader = new \Twig\Loader\FilesystemLoader('templates/');
$twig = new \Twig\Environment($loader);

try {
    echo $twig->render("{$template}.twig", $config);
} catch (\Exception $e) {
    echo $e->getMessage();
}
