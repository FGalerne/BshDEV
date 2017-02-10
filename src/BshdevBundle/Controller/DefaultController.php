<?php

namespace BshdevBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function homeAction()
    {
        return $this->render('BshdevBundle::homepage.html.twig');
    }

    public function contactAction()
    {
        return $this->render('BshdevBundle::contact.html.twig');
    }

    public function referencesAction()
    {
        return $this->render('BshdevBundle::references.html.twig');
    }

    public function historyAction()
    {
        return $this->render('BshdevBundle::history.html.twig');
    }
    public function expertisesAction()
    {
        return $this->render('BshdevBundle::expertises.html.twig');
    }
}
