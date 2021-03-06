<?php

use Acme\WebTestCase;

class ExampleCustomWebTestCaseFunctionalTest extends WebTestCase {
    public function testOne() {
        $app = $this->getApplication();
        $app['session']->set('test', true);

        $client = $this->createClient();
        $crawler = $client->request('GET', '/test');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains('SESSION DETECTED', $crawler->html());
    }

    public function testTwo() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/test');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertContains('nothing', $crawler->html());
    }
}