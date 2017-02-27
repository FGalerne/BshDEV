<?php

namespace BshdevBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Test\TypeTestCase;


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
            'src/BshdevBundle/Tests/img/Photo.jpg',
            'Photo.jpg',
            'image/jpg',
            9988
        );
        $cv = new UploadedFile(
            'src/BshdevBundle/Tests/img/CV.jpg',
            'CV.jpg',
            'image/jpg',
            9988
        );

        // validation du formulaire

        $client = static::createClient();

        $buttonPostule =$crawler->selectButton('Je Postule !');
        $form = $buttonPostule->form(array(
            'bshdevbundle_spontaCandidature[lastname]' => 'GALERNE',
            'bshdevbundle_spontaCandidature[firstname]' => 'Florian',
            'bshdevbundle_spontaCandidature[address]' => '18 place de l\'église',
            'bshdevbundle_spontaCandidature[cp]' => '75001',
            'bshdevbundle_spontaCandidature[town]' => 'Paris',
            'bshdevbundle_spontaCandidature[phone]' => '0137353636',
            'bshdevbundle_spontaCandidature[email]' => 'mail@mail.fr',
            'bshdevbundle_spontaCandidature[language]' => 'PHP, JAVA',
            'bshdevbundle_spontaCandidature[fileIdentity]' => $photo,
            'bshdevbundle_spontaCandidature[fileCv]' => $cv

        ));

        $client->submit($form);








    }



}




