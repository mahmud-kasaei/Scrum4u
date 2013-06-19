<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Task;
use GhaenCollege\ScrumBundle\Form\TaskType;

/**
 * Task controller.
 *
 */
class TaskController extends Controller
{
    /**
     * Lists all Task entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Task')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Task:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Task entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Task();
        $form = $this->createForm(new TaskType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Task:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Task entity.
     *
     */
    public function newAction()
    {
        $entity = new Task();
        $form   = $this->createForm(new TaskType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Task:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Task entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Task')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Task:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Task entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GhaenCollegeScrumBundle:Task')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }
        $editForm = $this->createForm(new TaskType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render('GhaenCollegeScrumBundle:Task:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Task entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GhaenCollegeScrumBundle:Task')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TaskType(), $entity);
        $editForm->bind($request);
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Task:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Task entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Task')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Task entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task'));
    }

    /**
     * Creates a form to delete a Task entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return /Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
