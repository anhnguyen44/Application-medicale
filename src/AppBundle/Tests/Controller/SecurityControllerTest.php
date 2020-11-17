<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
    }

    public function testLogout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/logout');
    }

    public function testChangepassword()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/changepassword');
    }

    public function testEncryptallfiles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/encryptAllFiles');
    }

}