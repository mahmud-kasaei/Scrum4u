<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Epic;
use GhaenCollege\ScrumBundle\Form\EpicType;

/**
 * Epic controller.
 *
 */
class EpicController extends Controller
{
    /**
     * Lists all Epic entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Epic')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Epic:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Epic entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Epic();
        $form = $this->createForm(new EpicType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('epic_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Epic:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Epic entity.
     *
     */
    public function newAction()
    {
        $entity = new Epic();
        $form   = $this->createForm(new EpicType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Epic:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Epic entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Epic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Epic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Epic:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Epic entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Epic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Epic entity.');
        }

        $editForm = $this->createForm(new EpicType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Epic:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Epic entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Epic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Epic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EpicType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('epic_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Epic:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Epic entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Epic')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Epic entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('epic'));
    }

    /**
     * Creates a form to delete a Epic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
