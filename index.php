<?php

require_once 'vendor/autoload.php';

if ($argc <= 1) {
    echo "Usage: {$argv[0]} template\n";
    exit(1);
}

$template = $argv[1];

if(!file_exists("templates/{$template}.conf.php")) {
    echo "Config file templates/{$template}.conf.php not found\n";
    echo 'Make sure to set your variables inside the twig template!\n';
    $config = [];
} else {
    $config = require_once "templates/{$template}.conf.php";
    if(!is_array($config)) {
        echo 'Config doesn\'t return an array\n';
        echo 'Make sure to set your variables inside the twig template!\n';
    }
}

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
        echo 'Could not create output/ directory\n';
        exit(1);
    }
}

if(file_put_contents("output/{$template}.conf", $render) === false) {
    echo "Could not write to output/{$template}.conf\n";
    exit(1);
};

echo "Output written to output/{$template}.conf\n";