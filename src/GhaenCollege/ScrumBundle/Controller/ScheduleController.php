<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Schedule;
use GhaenCollege\ScrumBundle\Form\ScheduleType;

/**
 * Schedule controller.
 *
 */
class ScheduleController extends Controller
{
    /**
     * Lists all Schedule entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Schedule')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Schedule:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Schedule entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Schedule();
        $form = $this->createForm(new ScheduleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('schedule_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Schedule:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Schedule entity.
     *
     */
    public function newAction()
    {
        $entity = new Schedule();
        $form   = $this->createForm(new ScheduleType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Schedule:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Schedule entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Schedule:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Schedule entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $editForm = $this->createForm(new ScheduleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Schedule:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Schedule entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Schedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Schedule entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ScheduleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('schedule_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Schedule:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Schedule entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Schedule')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Schedule entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('schedule'));
    }

    /**
     * Creates a form to delete a Schedule entity by id.
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
