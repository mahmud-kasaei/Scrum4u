<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Sprint;
use GhaenCollege\ScrumBundle\Form\SprintType;

/**
 * Sprint controller.
 *
 */
class SprintController extends Controller
{
    /**
     * Lists all Sprint entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Sprint')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Sprint:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Sprint entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Sprint();
        $form = $this->createForm(new SprintType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sprint_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Sprint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Sprint entity.
     *
     */
    public function newAction()
    {
        $entity = new Sprint();
        $form   = $this->createForm(new SprintType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Sprint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sprint entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Sprint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sprint entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Sprint:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Sprint entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Sprint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sprint entity.');
        }

        $editForm = $this->createForm(new SprintType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Sprint:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Sprint entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Sprint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sprint entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SprintType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sprint_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Sprint:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sprint entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Sprint')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sprint entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sprint'));
    }

    /**
     * Creates a form to delete a Sprint entity by id.
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
