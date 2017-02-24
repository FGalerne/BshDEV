<?php

namespace BshdevBundle\Controller;

use BshdevBundle\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Admin controller.
 *
 */
class AdminController extends Controller
{
    /**
     * Displays a form to edit an existing admin entity.
     *
     */
    public function editContactAction(Request $request, Admin $admin)
    {

        $form = $this->createForm('BshdevBundle\Form\EditContactType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_contact');
        }

        return $this->render('BshdevBundle:admin:editContact.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    public function editHomepageAction(Request $request, Admin $admin)
    {
        $form = $this->createForm('BshdevBundle\Form\EditHomepageType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_home');
        }

        return $this->render('BshdevBundle:admin:editHomepage.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    public function editHistoryAction(Request $request, Admin $admin)
    {

        $form = $this->createForm('BshdevBundle\Form\EditHistoryType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_history');
        }

        return $this->render('BshdevBundle:admin:editHistory.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),

        ));
    }


}
