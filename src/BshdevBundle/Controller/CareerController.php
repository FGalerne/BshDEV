<?php

namespace BshdevBundle\Controller;

use BshdevBundle\Entity\Career;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Career controller.
 *
 */
class CareerController extends Controller
{
    /**
     * Lists all career entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $careers = $em->getRepository('BshdevBundle:Career')->findAll();

        return $this->render('BshdevBundle:career:index.html.twig', array(
            'careers' => $careers,
        ));
    }

    /**
     * Creates a new career entity.
     *
     */
    public function newAction(Request $request)
    {
        $career = new Career();
        $form = $this->createForm('BshdevBundle\Form\CareerType', $career);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($career);
            $em->flush($career);

            return $this->redirectToRoute('career_show', array('id' => $career->getId()));
        }

        return $this->render('BshdevBundle:career:new.html.twig', array(
            'career' => $career,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a career entity.
     *
     */
    public function showAction(Career $career)
    {
        $deleteForm = $this->createDeleteForm($career);

        return $this->render('BshdevBundle:career:show.html.twig', array(
            'career' => $career,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing career entity.
     *
     */
    public function editAction(Request $request, Career $career)
    {
        $deleteForm = $this->createDeleteForm($career);
        $editForm = $this->createForm('BshdevBundle\Form\CareerType', $career);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('career_edit', array('id' => $career->getId()));
        }

        return $this->render('BshdevBundle:career:edit.html.twig', array(
            'career' => $career,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a career entity.
     *
     */
    public function deleteAction(Request $request, Career $career)
    {
        $form = $this->createDeleteForm($career);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($career);
            $em->flush($career);
        }

        return $this->redirectToRoute('career_index');
    }

    /**
     * Creates a form to delete a career entity.
     *
     * @param Career $career The career entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Career $career)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('career_delete', array('id' => $career->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
