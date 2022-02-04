<?php

require_once 'vendor/autoload.php';

if ($argc <= 1) {
    echo "Usage: {$argv[0]} template";
    exit(1);
}

$template = $argv[1];

if(!file_exists("templates/{$template}.conf.php")) {
    echo "Config file templates/{$template}.conf.php not found";
    exit(1);
}

$config = require_once "templates/{$template}.conf.php";
$loader = new \Twig\Loader\FilesystemLoader('templates/');
$twig = new \Twig\Environment($loader);

try {
    $render = $twig->render("{$template}.twig", $config);
} catch (\Exception $e) {
    echo $e->getMessage();
    exit(1);
}

if(!file_exists('output/')) {
    if(!mkdir('output/', 0755)) {
        echo 'Could not create output/ directory';
        exit(1);
    }
}

if(file_put_contents("output/{$template}.conf", $render) === false) {
    echo "Could not write to output/{$template}.conf";
    exit(1);
};