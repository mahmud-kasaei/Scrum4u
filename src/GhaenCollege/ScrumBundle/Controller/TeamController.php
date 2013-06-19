<?php

namespace GhaenCollege\ScrumBundle\Controller;

use GhaenCollege\ScrumBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Team;
use GhaenCollege\ScrumBundle\Form\TeamType;

/**
 * Team controller.
 *
 */
class TeamController extends Controller
{
    /**
     * Lists all Team entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GhaenCollegeScrumBundle:Team')->findAll();

        return $this->render('GhaenCollegeScrumBundle:Team:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Team entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Team();
        $sa = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new TeamType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity ->setSystemAdmin($sa);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('team_show', array('id' => $entity->getId())));
        }
        return $this->render('GhaenCollegeScrumBundle:Team:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to create a new Team entity.
     *
     */
    public function newAction()
    {
        $entity = new Team();
        $form   = $this->createForm(new TeamType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Team:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Finds and displays a Team entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Team entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Team:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    /**
     * Displays a form to edit an existing Team entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Team entity.');
        }

        $editForm = $this->createForm(new TeamType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Team:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Team entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Team entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TeamType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('team_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Team:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Team entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Team')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Team entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('team'));
    }

    /**
     * Creates a form to delete a Team entity by id.
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
