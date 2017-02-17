<?php
namespace BshdevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BshdevBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\File\File;

class LoadAdminData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin= new Admin();

        // Homepage
        $admin->setConcil('Accompagner les directions générales et les directions informatiques des grands groupes dans le cadre de leurs projets de transformation de leurs systèmes d’information : expertise MOA Banque Finance, Expertise MOA Assurance, Conseil en Décisionnel, MDM, Big Data');
        $admin->setServices('Apporter une expertise à haute valeur ajoutée dans le déploiement de services numériques, aussi bien dans le Build que dans le Run.');
        $admin->setInfrastruture('Accompagner les organisations dans la définition des architectures, l’intégration, l’optimisation, la supervision, l’administration, le stockage et la sécurité des données.');

        //History
        $admin->setHistory('Superatis Tauri montis verticibus qui ad solis ortum sublimius attolluntur, Cilicia spatiis porrigitur late distentis dives bonis omnibus terra, eiusque lateri dextro adnexa Isauria, pari sorte uberi palmite viget et frugibus minutis, quam mediam navigabile flumen Calycadnus interscindit.');
        $admin->setNumber('Superatis Tauri montis verticibus qui ad solis ortum sublimius attolluntur, Cilicia spatiis porrigitur late distentis dives bonis omnibus terra, eiusque lateri dextro adnexa Isauria, pari sorte uberi palmite viget et frugibus minutis, quam mediam navigabile flumen Calycadnus interscindit.');

        // Contact
        $admin->setFirstname('Bruno');
        $admin->setLastname('Haquin');
        $admin->setAddress('96 avenue Maunoury');
        $admin->setPostalCode('28600');
        $admin->setTown('Luisant');
        $admin->setPhone('0237355751');
        $admin->setCellphone('0650624574');

    }
}