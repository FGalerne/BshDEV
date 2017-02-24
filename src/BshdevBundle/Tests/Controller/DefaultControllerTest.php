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


        //this links are on the navbar
        //Connexion button test
        $link = $crawler
            ->filter('a:contains("Connexion")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('FOS\UserBundle\Controller\SecurityController::loginAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Accueil button test
        $link = $crawler
            ->filter('a:contains("Accueil")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\DefaultController::homeAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //A propos button test
        $link = $crawler
            ->filter('a:contains("A propos")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\DefaultController::historyAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Références button test
        $link = $crawler
            ->filter('a:contains("Références")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\DefaultController::referencesAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Nous contacter button test
        $link = $crawler
            ->filter('a:contains("Nous contacter")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\DefaultController::contactAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Nos Offres d'emploi button test
        $link = $crawler
            ->filter('a:contains("Nos Offres d\'emploi")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\JobController::indexAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //Candidature spontanée button test
        $link = $crawler
            ->filter('a:contains("Candidature spontanée")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);

        $this->assertEquals('BshdevBundle\Controller\PersonController::spontaCandidatureAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());


    }

    public function testLogin(){

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertTrue($crawler->filter('form input[name="_username"]')->count() == 1);
        $this->assertTrue($crawler->filter('form input[name="_password"]')->count() == 1);
        // Sélection basée sur la valeur, l'id ou le nom des boutons
        $form = $crawler->selectButton('Connexion')->form();
        $form['_username'] = 'admin';
        $form['_password'] = '123';
        $crawler = $client->submit($form);
        // Il faut suivre la redirection
        $this->assertEquals('FOS\UserBundle\Controller\SecurityController::checkAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());




    }


}




