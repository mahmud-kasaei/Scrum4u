<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Backlog;
use GhaenCollege\ScrumBundle\Form\BacklogType;

/**
 * Backlog controller.
 *
 */
class BacklogController extends Controller
{
    /**
     * Lists all Backlog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Backlog:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Backlog entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Backlog();
        $form = $this->createForm(new BacklogType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backlog_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Backlog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Backlog entity.
     *
     */
    public function newAction()
    {
        $entity = new Backlog();
        $form   = $this->createForm(new BacklogType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Backlog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Backlog entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Backlog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Backlog:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Backlog entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Backlog entity.');
        }

        $editForm = $this->createForm(new BacklogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Backlog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Backlog entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Backlog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BacklogType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backlog_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Backlog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Backlog entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Backlog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backlog'));
    }

    /**
     * Creates a form to delete a Backlog entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
