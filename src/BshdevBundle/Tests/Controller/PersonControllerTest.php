<?php

namespace BshdevBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class PersonControllerTest extends WebTestCase
{

    public function testSpontaCandidature()
    {

        //test de l'url
        //Create a new client to browse the application
        $client = static::createClient();

        $crawler =$client->request('GET', '/spontaCandidature');

        $this->assertEquals('BshdevBundle\Controller\PersonController::spontaCandidatureAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //upload
        $photo = new UploadedFile(
            'bshdev\src\BshdevBundle\Tests\img\Photo.jpg',
            'Photo.jpg',
            'image/jpg',
            9988
        );
        $cv = new UploadedFile(
            'BshdevBundle/Tests/img/CV.jpg',
            'CV.jpg',
            'image/jpg',
            9988
        );

     /*   // validation du formulaire

        $client = static::createClient();

        $form =$crawler->selectButton('Je Postule !')->form();
        $form['spontaCandidatureForm[lastname]'] = 'GALERNE';
        $form['spontaCandidatureForm[firstname]'] = 'Florian';
        $form['spontaCandidatureForm[address]'] = '10 rue de la poele';
        $form['spontaCandidatureForm[cp]'] = '14023';
        $form['spontaCandidatureForm[town]'] = 'Caen';
        $form['spontaCandidatureForm[email]'] = 'mail@mail.fr';
        $form['spontaCandidatureForm[phone]'] = '0123121212';
        $form['spontaCandidatureForm[language]'] = 'PHP, JAVA';
        $form['spontaCandidatureForm[fileIdentity]'] = $photo;
        $form['spontaCandidatureForm[fileCv]'] = $cv;*/






    }



}




