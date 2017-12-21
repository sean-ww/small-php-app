<?php

namespace App\controllers;

use Slim\Slim;
use App\models\Slugs;

/**
 * Slugs Controller
 */
class SlugsController
{
    /** @var Slim $app Instance of the Slim Application. */
    protected $app;

    /** @var Slugs $slugsModel Instance of an eloquent slugs model. */
    protected $slugsModel;

    /**
     * Constructor - Pull in dependencies.
     *
     * @param Slim  $app        Instance of the Slim Application.
     * @param Slugs $slugsModel Instance of an eloquent slugs model.
     */
    public function __construct(Slim $app, Slugs $slugsModel)
    {
        $this->app = $app;
        $this->slugsModel = $slugsModel;
    }

    public function renderSlugForm()
    {
        $data = [
            'template' => [
                'url' => 'components/createSlugForm.html'
            ]
        ];
        return $this->app->render('default.html', $data);
    }

    /**
     * Create Slug
     *
     * If a valid url is supplied, generate and store a slug to return.
     *
     * @param array $input The posted input array.
     *
     * @return null|string The new slug, or null.
     */
    public function createSlug($input)
    {
        $url = '';
        if (isset($input['url'])) {
            $url = $input['url'];
        }
        return $this->slugsModel->createSlug($url);
    }

    /**
     * Fetch the url for a given slug
     *
     * @param string $slug The slug to be fetched.
     *
     * @return null|string The url, or null.
     */
    public function fetchUrl($slug)
    {
        return $this->slugsModel->fetchUrl($slug);
    }
}
