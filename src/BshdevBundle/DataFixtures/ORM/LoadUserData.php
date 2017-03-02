<?php
namespace BshdevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use BshdevBundle\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('Bruno');
        $admin->setPlainPassword('bshdev28');
        $admin->setEmail('bshdev28@gmail.com');
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setEnabled(1);
        $manager->persist($admin);
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}