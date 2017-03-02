<?php
namespace BshdevBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'bshdevbundle_spontaCandidature[lastname]' => 'GALERNE',
            'bshdevbundle_spontaCandidature[firstname]' => 'Florian',
            'bshdevbundle_spontaCandidature[address]' => '18 place de l\'église',
            'bshdevbundle_spontaCandidature[cp]' => '75001',
            'bshdevbundle_spontaCandidature[town]' => 'Paris',
            'bshdevbundle_spontaCandidature[phone]' => '0137353636',
            'bshdevbundle_spontaCandidature[email]' => 'mail@mail.fr',
            'bshdevbundle_spontaCandidature[language]' => 'PHP, JAVA',
            'bshdevbundle_spontaCandidature[fileIdentity]' => $photo,
            'bshdevbundle_spontaCandidature[fileCv]' => $cv;
        ));
        $client->submit($form);
        $crawler = $client->followRedirect();


    }




}