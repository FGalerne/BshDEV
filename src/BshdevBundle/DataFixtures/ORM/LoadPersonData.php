<?php
namespace BshdevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BshdevBundle\Entity\Person;
use Symfony\Component\HttpFoundation\File\File;

class LoadPartnerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new Person ();
        $user1->setLastname('Dupont');
        $user1->setFirstname('Alban');
        $user1->setPhone('0237343020');
        $user1->setAddress('18 rue de la gare');
        $user1->setCp('28240');
        $user1->setTown('La loupe');
        $user1->setEmail('mail@mail.fr');
        // addition a cv
        $cv = new File('src/BshdevBundle/Resources/public/img/bouygues-telecom.jpg');
        $user1->fileLogo = $cv;

    }
}