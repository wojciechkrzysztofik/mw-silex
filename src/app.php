<?php
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;

// REGISTER DOCTRINE DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());

$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'silex_kitchen',
    'user'     => 'root',
    'password' => '',
);

// REGISTER TWIG
$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__ . '/../resources/views')
));

// REGISTER URL GENERATOR
$app->register(new UrlGeneratorServiceProvider());