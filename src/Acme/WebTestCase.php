<?php

namespace Acme;

use Acme\Application;
use Silex\WebTestCase as BaseWebTestCase;
use Symfony\Component\HttpKernel\HttpKernel;

class WebTestCase extends BaseWebTestCase {
    public function getApplication() {
        return $this->app;
    }

    public function createApplication()
    {
        $app = new Application();
        $app['debug'] = true;
        $app['session.test'] = true;
        return $app;
    }
}