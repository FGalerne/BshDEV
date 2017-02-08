<?php

namespace BshdevBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BshdevBundle:Default:index.html.twig');
    }
}
