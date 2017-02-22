<?php

namespace BshdevBundle\Controller;

use BshdevBundle\Entity\Partner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Partner controller.
 *
 */
class PartnerController extends Controller
{
    /**
     * Lists all partner entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partners = $em->getRepository('BshdevBundle:Partner')->findAll();

        return $this->render('BshdevBundle:partner:index.html.twig', array(
            'partners' => $partners,
        ));
    }

    /**
     * Creates a new partner entity.
     *
     */
    public function newAction(Request $request)
    {
        $partner = new Partner();
        $form = $this->createForm('BshdevBundle\Form\PartnerType', $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partner);
            $em->flush($partner);

            return $this->redirectToRoute('partner_show', array('id' => $partner->getId()));
        }

        return $this->render('BshdevBundle:partner:new.html.twig', array(
            'partner' => $partner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partner entity.
     *
     */
    public function showAction(Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);

        return $this->render('BshdevBundle:partner:show.html.twig', array(
            'partner' => $partner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partner entity.
     *
     */
    public function editAction(Request $request, Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);
        $form = $this->createForm('BshdevBundle\Form\PartnerType', $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partner_index');
        }

        return $this->render('BshdevBundle:partner:edit.html.twig', array(
            'partner' => $partner,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partner entity.
     *
     */
    public function deleteAction(Request $request, Partner $partner)
    {
        $form = $this->createDeleteForm($partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush($partner);
        }

        return $this->redirectToRoute('partner_index');
    }

    /**
     * Creates a form to delete a partner entity.
     *
     * @param Partner $partner The partner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partner $partner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partner_delete', array('id' => $partner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
