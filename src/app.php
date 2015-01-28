<?php
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\FormServiceProvider;

// REGISTER DOCTRINE DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());

// REGISTER TWIG
$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__ . '/../resources/views')
));

// REGISTER URL GENERATOR
$app->register(new UrlGeneratorServiceProvider());

// REGISTER FORMS
$app->register(new FormServiceProvider());

// REGISTER TRANSLATION
$app->register(new Silex\Provider\TranslationServiceProvider());