<?php

namespace BshdevBundle\Tests\Controller;

/*use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;*/
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class ProjetControllerTestControllerTest extends WebTestCase
{

    public function testHomePage()
    {
        $fixtures = array(
            'bshdev\BshdevBundle\DataFixtures\ORM\LoadJobData',
            'bshdev\BshdevBundle\DataFixtures\ORM\LoadPartnerData',
            'bshdev\BshdevBundle\DataFixtures\ORM\LoadAdminData',
            'bshdev\BshdevBundle\DataFixtures\ORM\LoadPersonData'
        );


        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/');
        $result = $crawler->filter('html:contains("Conseil")')->count();
        $expected = 0;
        $this->assertGreaterThan($expected, $result);
       /* $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'bshdevbundle_career[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'bshdevbundle_career[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());*/
    }


}
?>