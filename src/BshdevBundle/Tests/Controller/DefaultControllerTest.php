<?php

namespace BshdevBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class DefaultControllerTest extends WebTestCase
{

    public function testHomePage()
    {
        //Create a new client to browse the application
        $client = static::createClient();

        $crawler =$client->request('GET', '/');

        $this->assertEquals('BshdevBundle\Controller\DefaultController::homeAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Connexion button test
        $link = $crawler
            ->filter('a:contains("Connexion")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('FOS\UserBundle\Controller\SecurityController::loginAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());


    }
}




