<?php

namespace Travel\TravelBundle\Controller;

use Travel\TravelBundle\Entity\Ligne_maintenance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ligne_maintenance controller.
 *
 * @Route("ligne_maintenance")
 */
class Ligne_maintenanceController extends Controller
{
    /**
     * Lists all ligne_maintenance entities.
     *
     * @Route("/", name="ligne_maintenance_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ligne_maintenances = $em->getRepository('TravelBundle:Ligne_maintenance')->findAll();

        return $this->render('ligne_maintenance/index.html.twig', array(
            'ligne_maintenances' => $ligne_maintenances,
        ));
    }

    /**
     * Creates a new ligne_maintenance entity.
     *
     * @Route("/new", name="ligne_maintenance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ligne_maintenance = new Ligne_maintenance();
        $form = $this->createForm('Travel\TravelBundle\Form\Ligne_maintenanceType', $ligne_maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ligne_maintenance);
            $em->flush();

            return $this->redirectToRoute('maintenance_show', array('id' => $ligne_maintenance->getMaintenance()->getId()));
        }

        return $this->render('ligne_maintenance/new.html.twig', array(
            'ligne_maintenance' => $ligne_maintenance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ligne_maintenance entity.
     *
     * @Route("/{id}", name="ligne_maintenance_show")
     * @Method("GET")
     */
    public function showAction(Ligne_maintenance $ligne_maintenance)
    {
        $deleteForm = $this->createDeleteForm($ligne_maintenance);

        return $this->render('ligne_maintenance/show.html.twig', array(
            'ligne_maintenance' => $ligne_maintenance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ligne_maintenance entity.
     *
     * @Route("/{id}/edit", name="ligne_maintenance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ligne_maintenance $ligne_maintenance)
    {
        $deleteForm = $this->createDeleteForm($ligne_maintenance);
        $editForm = $this->createForm('Travel\TravelBundle\Form\Ligne_maintenanceType', $ligne_maintenance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_maintenance_edit', array('id' => $ligne_maintenance->getId()));
        }

        return $this->render('ligne_maintenance/edit.html.twig', array(
            'ligne_maintenance' => $ligne_maintenance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ligne_maintenance entity.
     *
     * @Route("/{id}", name="ligne_maintenance_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ligne_maintenance $ligne_maintenance)
    {
        $form = $this->createDeleteForm($ligne_maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ligne_maintenance);
            $em->flush();
        }

        return $this->redirectToRoute('ligne_maintenance_index');
    }

    /**
     * Creates a form to delete a ligne_maintenance entity.
     *
     * @param Ligne_maintenance $ligne_maintenance The ligne_maintenance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ligne_maintenance $ligne_maintenance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligne_maintenance_delete', array('id' => $ligne_maintenance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
