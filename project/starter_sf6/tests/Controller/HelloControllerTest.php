<?php
namespace App\Tests\Controller;

use App\Controller\HelloController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testHelloRandomRoute()
    {
        $client = static::createClient();

        $crawler = $client->request("GET", "/helloRandom");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("Hello", $crawler->filter("h1")->text());
    }

    function testRandomNameGenerator()
    {
        $rdName = HelloController::generateRandomName();
        $this->assertGreaterThan(1, strlen($rdName));
    }

    public function testNameActionRoute()
    {
        $client = static::createClient();

        $crawler = $client->request("GET", "/hello/Albus Perceval Wulfric Brian Dumbledore");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString("Hello Albus Perceval Wulfric Brian Dumbledore", $crawler->filter("h1")->text());
    }
}