<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

require __DIR__.'/../src/app.php';
require __DIR__.'/../src/controller.php';

$app->run();
