<?php
namespace BshdevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BshdevBundle\Entity\Partner;
use Symfony\Component\HttpFoundation\File\File;

class LoadPartnerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // datafixture for Bouyges
        $bouygues = new Partner();
        $bouygues->setTitle('Nos réalisations');
        $bouygues->setDescription('');
        // set logo
        $bouygues->setAlt('Logo Bouygues');
        $logoBouygues = new File('src/BshdevBundle/Resources/public/img/bouygues-telecom.jpg');
        $bouygues->fileLogo = $logoBouygues;

        $manager->persist($bouygues);
        $manager->flush();

        // datafixture for Ophtalmic
        $ophtalmic = new Partner();
        $ophtalmic->setTitle('Nos réalisations');
        $ophtalmic->setDescription('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna');
            // Logo picture for Ophtalmic
        $ophtalmic->setAlt('Logo Ophtalmic');
        $logoOphtalmic = new File('src/BshdevBundle/Resources/public/img/bouygues-telecom.jpg');
        $ophtalmic->fileLogo = $logoOphtalmic;

        $manager->persist($ophtalmic);
        $manager->flush();

        // datafixture for Steria
        $steria = new Partner();
        $steria->setTitle('Nos réalisations');
        $steria->setDescription('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna');
            //Logo picture for Steria
        $steria->setAlt('Logo Steria');
        $logoSteria = new File('src/BshdevBundle/Resources/public/img/steria.jpg');
        $steria->fileLogo = $logoSteria;

        $manager->persist($steria);
        $manager->flush();

        // datafixture for Ericsson
        $ericsson = new Partner();
        $ericsson->setTitle('Nos réalisations');
        $ericsson->setDescription('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna');
            // Logo picture for Ericsson
        $ericsson->setAlt('Logo Ericsson');
        $logoEricsson = new File('src/BshdevBundle/Resources/public/img/Ericsson-logo-blue.png');
        $ericsson->fileLogo = $logoEricsson;

        $manager->persist($ericsson);
        $manager->flush();
    }
}