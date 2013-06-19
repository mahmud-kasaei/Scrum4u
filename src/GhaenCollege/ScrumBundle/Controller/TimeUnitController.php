<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\TimeUnit;
use GhaenCollege\ScrumBundle\Form\TimeUnitType;

/**
 * TimeUnit controller.
 *
 */
class TimeUnitController extends Controller
{
    /**
     * Lists all TimeUnit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:TimeUnit')->findAll();

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new TimeUnit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TimeUnit();
        $form = $this->createForm(new TimeUnitType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('time_unit_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TimeUnit entity.
     *
     */
    public function newAction()
    {
        $entity = new TimeUnit();
        $form   = $this->createForm(new TimeUnitType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TimeUnit entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:TimeUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeUnit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TimeUnit entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:TimeUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeUnit entity.');
        }

        $editForm = $this->createForm(new TimeUnitType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TimeUnit entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:TimeUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeUnit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TimeUnitType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('time_unit_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:TimeUnit:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TimeUnit entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:TimeUnit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TimeUnit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('time_unit'));
    }

    /**
     * Creates a form to delete a TimeUnit entity by id.
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
