<?php
namespace BshdevBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PersonControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        //Create a new entry in a database
        $crawler = $client->request('GET', '/spontaCandidature');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "La route n'existe pas");
        $crawler = $client->click($crawler->selectLink('Candidature spontanée')->link());

        //upload for the identity and cv pictures
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

        // Fill in the form and submit it
        $form = $crawler->selectButton('Je Postule !')->form(array(
            'bshdevbundle_spontaCandidature[lastname]' => 'GALERNE',
            'bshdevbundle_spontaCandidature[firstname]' => 'Florian',
            'bshdevbundle_spontaCandidature[address]' => '18 place de l\'église',
            'bshdevbundle_spontaCandidature[cp]' => '750201',
            'bshdevbundle_spontaCandidature[town]' => 'Paris',
            'bshdevbundle_spontaCandidature[phone]' => '0137353636',
            'bshdevbundle_spontaCandidature[email]' => 'mail@mail.fr',
            'bshdevbundle_spontaCandidature[language]' => 'PHP, JAVA',
            'bshdevbundle_spontaCandidature[fileIdentity]' => $photo,
            'bshdevbundle_spontaCandidature[fileCv]' => $cv
        ));
        $client->submit($form);
        $crawler = $client->followRedirect();

        //Check data in




    }




}