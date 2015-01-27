<?php
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;

// REGISTER DOCTRINE DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());

// REGISTER TWIG
$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__ . '/../resources/views')
));

// REGISTER URL GENERATOR
$app->register(new UrlGeneratorServiceProvider());