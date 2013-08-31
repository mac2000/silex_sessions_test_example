<?php

use Acme\Application;
use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernel;

class ExampleFunctionalTest extends WebTestCase {
    public function testOne() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/set');

        $this->assertTrue($client->getResponse()->isRedirect('/test'));

        $crawler = $client->followRedirect();

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains('SESSION DETECTED', $crawler->html());
    }

    public function testTwo() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/test');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains('nothing', $crawler->html());
    }

    public function createApplication() {
        $app = new \Acme\Application();
        $app['debug'] = true;
        $app['session.test'] = true;
        return $app;
    }
}