<?php
use Symfony\Component\HttpFoundation\Request;

// /
$app->match('/', function () use ($app) {

    return $app['twig']->render('start.html.twig');
})
->method('GET')->bind('start');

// /hello/{name}
$app->match('/hello/{name}', function ($name) use ($app) {

    return $app['twig']->render(
        'hello.html.twig',
        array(
            'name' => $app->escape($name)
        )
    );
})
->method('GET')->bind('hello')->value('name', 'World');

// /entries
$app->match('/entries', function () use ($app) {
    $sql = "SELECT * FROM entries ORDER BY created_at DESC";
    $entries = $app['db']->fetchAll($sql);

    return $app['twig']->render(
        'entries.html.twig',
        array(
            'entries' => $entries
        )
    );
})
->method('GET')->bind('entries');

// /add
$app->match('/add', function (Request $request) use ($app) {

    $form = $app['form.factory']->createBuilder('form')
        ->add('name')
        ->add('email')
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
        $data = $form->getData();

        // do something with the data
        $app['db']->insert('entries', array('name' => $app->escape($data['name']), 'email' => $app->escape($data['email'])));

        // redirect somewhere
        return $app->redirect('entries');
    }

    // display the form
    return $app['twig']->render('add.html.twig', array('form' => $form->createView()));
})
->bind('add');