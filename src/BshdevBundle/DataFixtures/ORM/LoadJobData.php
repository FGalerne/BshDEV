<?php
namespace BshdevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use BshdevBundle\Entity\Job;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadJobData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $job1 = new Job();
        $job1->setTitle('Développeur C#');
        $job1->setDescription('Nous recherchons un développeur Full-Stack pour l\'un de nos client, une société française pionnière de l’engagement sur les contenus et les publicités multi-écrans. Vous rejoindrez une petite équipe dynamique composée de développeurs, de testeurs, de chefs de projets et de graphistes.

Vos missions :
Vous participerez au développement de nouvelles fonctionnalités et à la stabilisation des projets web et mobiles. Il s’agira de travailler sur des fonctionnalités mobiles natives (iOS, Android), web (Cross-Platform), et/ou backend (.NET, NodeJS, AWS), selon votre profil.

Vos compétences :
- Vous justifiez d’une bonne expérience en développement et un intérêt prononcé pour le développement d’applications Javascript (Backbone, Bootstrap…) et devrez justifier d’une expérience professionnelle réussie parmi :
- Développement mobile natif / hybride – Android (Java), iOS (objective-c)
- Développement d’applications web
- C# .NET
- Amazon AWS, Microsoft Azure…
- Node.JS
- La maitrise de l’anglais Lu/Ecrit est obligatoire et la maitrise de l’anglais Parlé est un plus.

Travaille en équipe, communication, curiosité, soucis du détail, pragmatisme et polyvalence sont les maitre-mots qui définissent votre caractère.');

        $manager->persist($job1);
        $manager->flush();

        $job2 = new Job();
        $job2->setTitle('Développeur PHP Senior H/F');
        $job2->setDescription('MyCommunIT recherche un développeur PHP senior pour l\'un de ses client, une start-up parisienne éditeur d\'une solution permettant de créer rapidement des vidéos de présentation.

Vous avez entre 6 et 10 ans d\'expérience professionnelle. Une rémunération entre 45 et 70K€ selon le profil est proposée.

Vous travaillerez en collaboration avec le CTO sur différentes missions :
- Développer et lancer de nouveaux services,
- Optimiser et améliorer les services existants, 
- Assurer le suivi de nos partenaires grands comptes et la gestion de leurs projets sur-mesure,
- Assurer une maintenance opérationnelle sur la plateforme web (suivi back office, développements PHP, interventions et consultations en base de données),
- Assurer une maintenance opérationnelle sur les machines virtuelles.

Les connaissances requises
En développement web :
- PHP orienté objet
- HTML / CSS 
- Javascript / JQuery 

En base de données : 
- MySQL / PhpMyAdmin 

Les compétences souhaitées : 
- Connaissance du CMS Prestashop
- Connaissance des services Amazon Web Services (S3, EC2, SQS) ou Google Cloud
- Connaissances en infogérance Linux, connaissances en gestion de serveur Windows
- Connaissances du logiciel Adobe After Effect et de la suite Adobe Creative Cloud');

        $manager->persist($job2);
        $manager->flush();

        $job3 = new Job();
        $job3->setTitle('Développeur Javascript -Angular (H/F)');
        $job3->setDescription('Notre client est un éditeur de solutions de confiance, spécialisé en cybersécurité, présent à travers une centaines de pays via son écosystème de revendeurs.
Dans le cadre de sa forte expansion, notre client souhaiterait intégrer un Développeur Javascript -Angular (H/F) au sein de ses équipes parisiennes.
 
Rôle et Responsabilité :

Vous intégrerez un véritable acteur - précurseur  sur le marché de la cybersécurité. Vos principales missions seront : 
Développer de nouvelles applications 
Corriger les anomalies et développer les évolutions
Faire de la veille technologique.
Ingénieur de formation, vous justifiez d’une expérience comprise entre  2 et  5 ans  sur le poste de Développeur Javascript -Angular (H/F)
Vous maîtrisez parfaitement le language Angular.
Vous êtes rigoureux, organisé,  aimez le travail en groupe et avez de fortes appétences pour la sécurité informatique.');

        $manager->persist($job3);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}