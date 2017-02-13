<?php

namespace BshdevBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BshdevBundle\Entity\Admin;

class DefaultController extends Controller
{

    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('BshdevBundle:Admin')->findAll();
        return $this->render('BshdevBundle::homepage.html.twig', array(
            'admins' => $admins,

    ));
    }

    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('BshdevBundle:Admin')->findAll();
        return $this->render('BshdevBundle::contact.html.twig', array(
            'admins' => $admins,
        ));
    }

    public function referencesAction()
    {
        return $this->render('BshdevBundle::references.html.twig');
    }

    public function historyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $admins = $em->getRepository('BshdevBundle:Admin')->findAll();
        return $this->render('BshdevBundle::history.html.twig', array(
            'admins' => $admins
        ));
    }
    public function expertisesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $admins = $em->getRepository('BshdevBundle:Admin')->findAll();
        return $this->render('BshdevBundle::expertises.html.twig', array(
            'admins' => $admins
        ));
    }
}
