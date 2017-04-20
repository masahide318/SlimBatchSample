<?php
// DIC configuration


use Batch\Sample\Factory\ServiceFactory;
use Batch\Sample\Handler\NotFoundHandler;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};


$container['notFoundHandler'] = function () {
    return new NotFoundHandler();
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['db'] = function ($c) {
    $settings = $c->get('settings')['database'];
    $pdo = new PDO('mysql:host=' . $settings['host'] . ';dbname=' . $settings['dbName'] . ';charset=utf8', $settings['user'], $settings['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    return $pdo;
};

$container['serviceFactory'] = function ($c) {
    return new ServiceFactory($c);
};