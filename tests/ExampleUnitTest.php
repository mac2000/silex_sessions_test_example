<?php

use Acme\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ExampleUnitTest extends PHPUnit_Framework_TestCase {
    /**
     * @var Application
     */
    private $app;

    public function setUp() {
        $this->app = new Application();
        $this->app['debug'] = true;
        $this->app['session.test'] = true;
    }

    public function testOne() {
        $this->app['session']->set('test', true);

        $request = Request::create('/test');
        $response = $this->app->handle($request);

        $this->assertTrue($response->isOk());
        $this->assertContains('SESSION DETECTED', $response->getContent());
    }

    public function testTwo() {
        $request = Request::create('/test');
        $response = $this->app->handle($request);

        $this->assertTrue($response->isOk());
        $this->assertContains('nothing', $response->getContent());
    }
}