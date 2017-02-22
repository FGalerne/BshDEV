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
     * Lists all admin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('BshdevBundle:Admin')->findAll();

        return $this->render('BshdevBundle:admin:index.html.twig', array(
            'admins' => $admins,
        ));
    }

    /**
     * Creates a new admin entity.
     *
     */
    public function newAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm('BshdevBundle\Form\AdminType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush($admin);

            return $this->redirectToRoute('admin_show', array('id' => $admin->getId()));
        }

        return $this->render('BshdevBundle:admin:new.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a admin entity.
     *
     */
    public function showAction(Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);

        return $this->render('BshdevBundle:admin:show.html.twig', array(
            'admin' => $admin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing admin entity.
     *
     */
    public function editContactAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $form = $this->createForm('BshdevBundle\Form\EditContactType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_contact');
        }

        return $this->render('BshdevBundle:admin:editContact.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editHomepageAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $form = $this->createForm('BshdevBundle\Form\EditHomepageType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_home');
        }

        return $this->render('BshdevBundle:admin:editHomepage.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editHistoryAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $form = $this->createForm('BshdevBundle\Form\EditHistoryType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bshdev_history');
        }

        return $this->render('BshdevBundle:admin:editHistory.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a admin entity.
     *
     */
    public function deleteAction(Request $request, Admin $admin)
    {
        $form = $this->createDeleteForm($admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush($admin);
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a admin entity.
     *
     * @param Admin $admin The admin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Admin $admin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $admin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
