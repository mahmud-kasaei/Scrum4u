<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\UserGroup;
use GhaenCollege\ScrumBundle\Form\UserGroupType;

/**
 * UserGroup controller.
 *
 */
class UserGroupController extends Controller
{
    /**
     * Lists all UserGroup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:UserGroup')->findAll();

        return $this->render('GhaenCollegeScrumBundle:UserGroup:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new UserGroup entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new UserGroup();
        $form = $this->createForm(new UserGroupType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_group_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:UserGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new UserGroup entity.
     *
     */
    public function newAction()
    {
        $entity = new UserGroup();
        $form   = $this->createForm(new UserGroupType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:UserGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserGroup entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:UserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:UserGroup:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing UserGroup entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:UserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserGroup entity.');
        }

        $editForm = $this->createForm(new UserGroupType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:UserGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing UserGroup entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:UserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UserGroupType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_group_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:UserGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a UserGroup entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:UserGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user_group'));
    }

    /**
     * Creates a form to delete a UserGroup entity by id.
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
