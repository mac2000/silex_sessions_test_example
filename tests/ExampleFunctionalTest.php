<?php

use Acme\Application;
use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernel;

class ExampleFunctionalTest extends WebTestCase {
    public function testOne() {
        $client = $this->createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/set');
        $crawler = $client->request('GET', '/test');

        $this->assertContains('SESSION DETECTED', $crawler->html());
    }

    public function testTwo() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/test');

        $this->assertContains('nothing', $crawler->html());
    }

    public function createApplication() {
        $app = new \Acme\Application();
        $app['debug'] = true;
        $app['session.test'] = true;
        return $app;
    }
}