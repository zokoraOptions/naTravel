<?php

namespace Travel\TravelBundle\Controller;

use Travel\TravelBundle\Entity\Carburant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Carburant controller.
 *
 * @Route("carburant")
 */
class CarburantController extends Controller
{
    /**
     * Lists all carburant entities.
     *
     * @Route("/", name="carburant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carburants = $em->getRepository('TravelBundle:Carburant')->findAll();

        return $this->render('carburant/index.html.twig', array(
            'carburants' => $carburants,
        ));
    }

    /**
     * Creates a new carburant entity.
     *
     * @Route("/new", name="carburant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carburant = new Carburant();
        $form = $this->createForm('Travel\TravelBundle\Form\CarburantType', $carburant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carburant);
            $em->flush();

            return $this->redirectToRoute('carburant_show', array('id' => $carburant->getId()));
        }

        return $this->render('carburant/new.html.twig', array(
            'carburant' => $carburant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carburant entity.
     *
     * @Route("/{id}", name="carburant_show")
     * @Method("GET")
     */
    public function showAction(Carburant $carburant)
    {
        $deleteForm = $this->createDeleteForm($carburant);

        return $this->render('carburant/show.html.twig', array(
            'carburant' => $carburant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carburant entity.
     *
     * @Route("/{id}/edit", name="carburant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Carburant $carburant)
    {
        $deleteForm = $this->createDeleteForm($carburant);
        $editForm = $this->createForm('Travel\TravelBundle\Form\CarburantType', $carburant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carburant_edit', array('id' => $carburant->getId()));
        }

        return $this->render('carburant/edit.html.twig', array(
            'carburant' => $carburant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carburant entity.
     *
     * @Route("/{id}", name="carburant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Carburant $carburant)
    {
        $form = $this->createDeleteForm($carburant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carburant);
            $em->flush();
        }

        return $this->redirectToRoute('carburant_index');
    }

    /**
     * Creates a form to delete a carburant entity.
     *
     * @param Carburant $carburant The carburant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carburant $carburant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carburant_delete', array('id' => $carburant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
