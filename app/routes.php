<?php

use App\models\Slugs;
use App\controllers\SlugsController;

$slugsModel = new Slugs();
$slugsController = new SlugsController($app, $slugsModel);

// Home page create url form
$app->get('/', function () use ($slugsController) {
    return $slugsController->renderSlugForm();
});

// Handle slug requests
$app->post('/', function () use ($app, $slugsController) {
    $input = $app->request->post();
    $slug = $slugsController->createSlug($input);
    if ($slug) {
        $app->halt(
            201,
            $slug
        );
    } else {
        $app->halt(400);
    }
});

// View url
//$app->get('/l/:slug', function () use ($app) {
//
//});
