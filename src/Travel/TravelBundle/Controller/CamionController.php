<?php

namespace Travel\TravelBundle\Controller;

use Travel\TravelBundle\Entity\Camion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Camion controller.
 *
 * @Route("camion")
 */
class CamionController extends Controller
{
    /**
     * Lists all camion entities.
     *
     * @Route("/", name="camion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $camions = $em->getRepository('TravelBundle:Camion')->findAll();

        return $this->render('camion/index.html.twig', array(
            'camions' => $camions,
        ));
    }

    /**
     * Creates a new camion entity.
     *
     * @Route("/new", name="camion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $camion = new Camion();
        $form = $this->createForm('Travel\TravelBundle\Form\CamionType', $camion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($camion);
            $em->flush();

            return $this->redirectToRoute('camion_show', array('id' => $camion->getId()));
        }

        return $this->render('camion/new.html.twig', array(
            'camion' => $camion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a camion entity.
     *
     * @Route("/{id}", name="camion_show")
     * @Method("GET")
     */
    public function showAction(Camion $camion)
    {
        $deleteForm = $this->createDeleteForm($camion);

        return $this->render('camion/show.html.twig', array(
            'camion' => $camion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing camion entity.
     *
     * @Route("/{id}/edit", name="camion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Camion $camion)
    {
        $deleteForm = $this->createDeleteForm($camion);
        $editForm = $this->createForm('Travel\TravelBundle\Form\CamionType', $camion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('camion_edit', array('id' => $camion->getId()));
        }

        return $this->render('camion/edit.html.twig', array(
            'camion' => $camion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a camion entity.
     *
     * @Route("/{id}", name="camion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Camion $camion)
    {
        $form = $this->createDeleteForm($camion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($camion);
            $em->flush();
        }

        return $this->redirectToRoute('camion_index');
    }

    /**
     * Creates a form to delete a camion entity.
     *
     * @param Camion $camion The camion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Camion $camion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('camion_delete', array('id' => $camion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
