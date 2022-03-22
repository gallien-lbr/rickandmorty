<?php
declare(strict_types=1);

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PagesTest extends WebTestCase
{
    // 02 - simple test to check homepage will responds HTTP 200 and display text correctly
    public function testDisplaySiteIndexSuccess():void
    {
        $client = static::createClient();
        $client->request('GET','/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1','Site index');
    }
}