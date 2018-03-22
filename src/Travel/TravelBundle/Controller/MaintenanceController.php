<?php

namespace Travel\TravelBundle\Controller;

use Travel\TravelBundle\Entity\Maintenance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Maintenance controller.
 *
 * @Route("maintenance")
 */
class MaintenanceController extends Controller
{
    /**
     * Lists all maintenance entities.
     *
     * @Route("/", name="maintenance_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $maintenances = $em->getRepository('TravelBundle:Maintenance')->findAll();

        return $this->render('maintenance/index.html.twig', array(
            'maintenances' => $maintenances,
        ));
    }

    /**
     * Creates a new maintenance entity.
     *
     * @Route("/new/{idTransport}", name="maintenance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,$idTransport)
    {
        $em = $this->getDoctrine()->getManager();
        $maintenance = new Maintenance();
        $transport= $em->getRepository('TravelBundle:Transport')->find($idTransport);
        if (!empty($transport)) {
            $maintenance->setTransport($transport);
        }
        $form = $this->createForm('Travel\TravelBundle\Form\MaintenanceType', $maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em->persist($maintenance);
            $em->flush();

            return $this->redirectToRoute('maintenance_show', array('id' => $maintenance->getId()));
        }

        return $this->render('maintenance/new.html.twig', array(
            'maintenance' => $maintenance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a maintenance entity.
     *
     * @Route("/{id}", name="maintenance_show")
     * @Method("GET")
     */
    public function showAction(Maintenance $maintenance)
    {
        $deleteForm = $this->createDeleteForm($maintenance);
        return $this->render('maintenance/show.html.twig', array(
            'maintenance' => $maintenance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing maintenance entity.
     *
     * @Route("/{id}/edit", name="maintenance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Maintenance $maintenance)
    {
        $deleteForm = $this->createDeleteForm($maintenance);
        $editForm = $this->createForm('Travel\TravelBundle\Form\MaintenanceType', $maintenance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('maintenance_edit', array('id' => $maintenance->getId()));
        }

        return $this->render('maintenance/edit.html.twig', array(
            'maintenance' => $maintenance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a maintenance entity.
     *
     * @Route("/{id}", name="maintenance_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Maintenance $maintenance)
    {
        $form = $this->createDeleteForm($maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($maintenance);
            $em->flush();
        }

        return $this->redirectToRoute('maintenance_index');
    }

    /**
     * Creates a form to delete a maintenance entity.
     *
     * @param Maintenance $maintenance The maintenance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Maintenance $maintenance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maintenance_delete', array('id' => $maintenance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
