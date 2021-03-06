<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../resources/config/dev.php';
require __DIR__.'/../src/app.php';
require __DIR__.'/../src/controller.php';

$app->run();
