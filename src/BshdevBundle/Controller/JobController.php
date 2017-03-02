<?php

namespace BshdevBundle\Controller;

use BshdevBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{
    /**
     * Lists all job entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository('BshdevBundle:Job')->findAll();

        return $this->render('BshdevBundle:job:index.html.twig', array(
            'jobs' => $jobs,
        ));
    }

    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository('BshdevBundle:Job')->findAll();

        return $this->render('BshdevBundle:job:list.html.twig', array(
            'jobs' => $jobs,


        ));
    }

    public function deleteAction(Request $request, Job $job)
    {
        /*$form = $this->createDeleteForm($job);*/
       /* $form->handleRequest($request);*/

        /*if ($form->isSubmitted() && $form->isValid()) {*/
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush($job);
      /*  }*/

        return $this->redirectToRoute('job_list');
    }

    /**
     * Creates a new job entity.
     *
     */
    public function newAction(Request $request)
    {
        $job = new Job();
        $form = $this->createForm('BshdevBundle\Form\JobType', $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush($job);

            return $this->redirectToRoute('job_list', array('id' => $job->getId()));
        }

        return $this->render('BshdevBundle:job:new.html.twig', array(
            'job' => $job,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing job entity.
     *
     */
    public function editAction(Request $request, Job $job)
    {
        /*$deleteForm = $this->createDeleteForm($job);*/
        $form = $this->createForm('BshdevBundle\Form\JobType', $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_list', array('id' => $job->getId()));
        }

        return $this->render('BshdevBundle:job:edit.html.twig', array(
            'job' => $job,
            'form' => $form->createView(),
            /*'delete_form' => $deleteForm->createView(),*/
        ));
    }

    /**
     * Finds and displays a job entity.
     *
     */
    public function showAction(Job $job)
    {
        /*$deleteForm = $this->createDeleteForm($job);*/
        return $this->render('BshdevBundle:job:show.html.twig', array(
            'job' => $job,
            /*'delete_form' => $deleteForm->createView(),*/
        ));
    }



}
