<?php
	
// /{name}
$app->match('/{name}', function ($name) use ($app) {

    return $app['twig']->render(
        'start.html.twig',
        array(
            'name' => $app->escape($name)
        )
    );
})
->method('GET')->bind('start')->value('name', 'World');

// /entries
$app->match('/entries', function () use ($app) {
	$sql = "SELECT * FROM entries ORDER BY created_at DESC";
    $entries = $app['db']->fetchAssoc($sql);

    return json_encode($entries);
})
->method('GET')->bind('entries');