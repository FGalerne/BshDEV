<?php

namespace BshdevBundle\Controller;

use BshdevBundle\Entity\Person;
use BshdevBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Person controller.
 *
 */
class PersonController extends Controller
{
    /**
     * Lists all person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $persons = $em->getRepository('BshdevBundle:Person')->findAll();

        return $this->render('BshdevBundle:Person:index.html.twig', array(
            'persons' => $persons,

        ));
    }

    /**
     * Creates a new person entity.
     *
     */

    public function candidatureAction(Request $request, Job $job)
    {
        $person = new Person();
        $form = $this->createForm('BshdevBundle\Form\CandidatureType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person->setJob($job);
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush($person);

            return $this->redirectToRoute('person_candidature');
        }

        return $this->render('BshdevBundle:person:candidature.html.twig', array(
            'person' => $person,
            'form' => $form->createView(),
        ));
    }

    public function spontaCandidatureAction(Request $request)
    {
        $person = new Person();
        $form = $this->createForm('BshdevBundle\Form\SpontaCandidatureType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush($person);

            return $this->redirectToRoute('person_spontaCandidature');
        }

        return $this->render('BshdevBundle:person:spontaCandidature.html.twig', array(
            'person' => $person,
            'form' => $form->createView(),
        ));
    }


}
