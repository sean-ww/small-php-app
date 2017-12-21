<?php

namespace App;

use \Slim\Slim as Application;
use \Slim\Views\Twig as ViewLibrary;

/**
 * Application Class
 *
 * A class to instantiate a Slim application.
 */
class App
{
    /** @var Application $app Application object. */
    protected $app;

    /** @var ViewLibrary $view Object for rendering views. */
    protected $view;

    /**
     * Constructor - Pull in app dependencies, set configuration and routes.
     *
     * @param Application $app  Instance of the Application.
     * @param ViewLibrary $view An instance of the view library.
     */
    public function __construct(
        Application $app,
        ViewLibrary $view
    ) {
        $this->app = $app;

        // Configure Slim Views
        $this->app->config('view', $view);
        $this->app->config('templates.path', __DIR__ . '/views');
    }

    /**
     * Get an instance of the application
     *
     * @return Application Instance of the Application.
     */
    public function getInstance()
    {
        return $this->app;
    }
}
