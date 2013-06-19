<?php

namespace GhaenCollege\ScrumBundle\Controller;

use GhaenCollege\ScrumBundle\Form\ProjectSearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\QueryBuilder;
use GhaenCollege\ScrumBundle\Entity\Project;
use GhaenCollege\ScrumBundle\Form\ProjectType;

/**
 * Project controller.
 *
 */
class ProjectController extends Controller
{
    /**
     * Lists all Project entities.
     *
     */
    public function indexAction()
    {
        $form = $this->createForm(new ProjectSearchType());
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('GhaenCollegeScrumBundle:Project')->findAll();
        $qb = $em->createQueryBuilder();
        $qb = $qb->select('project')
            ->from('GhaenCollegeScrumBundle:Project', 'project');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1)/*page number*/,
            3/*limit per page*/
        );

        return $this->render('GhaenCollegeScrumBundle:Project:index.html.twig', array(
            'entities' => $pagination,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Project entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Project();
        $form = $this->createForm(new ProjectType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash('notice', 'پروژه جدید با موفقیت ثبت شد.');
            return $this->redirect($this->generateUrl('project_show', array('id' => $entity->getId())));
        }

        return $this->render('GhaenCollegeScrumBundle:Project:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Project entity.
     *
     */
    public function newAction()
    {
        $entity = new Project();
        $form   = $this->createForm(new ProjectType(), $entity);

        return $this->render('GhaenCollegeScrumBundle:Project:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Project entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Project:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Project entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $editForm = $this->createForm(new ProjectType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GhaenCollegeScrumBundle:Project:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Project entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GhaenCollegeScrumBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProjectType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash('notice', 'تغییرات  با موفقیت ثبت شد');
            return $this->redirect($this->generateUrl('project_edit', array('id' => $id)));
        }

        return $this->render('GhaenCollegeScrumBundle:Project:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Project entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GhaenCollegeScrumBundle:Project')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Project entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('project'));
    }

    /**
     * Creates a form to delete a Project entity by id.
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
    public function searchAction(Request $request){
        $form=$this->createForm(new ProjectSearchType());
        $form->bind($request);
        $em=$this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb = $qb->select('Project')
            ->from('GhaenCollegeScrumBundle:Project', 'Project');

        if($form["title"]->getData()!=null)
            $qb->andWhere($qb->expr()->like('Project.title', $qb->expr()->literal($form["title"]->getData() . '%')));
        if($form["description"]->getData()!=null)
            $qb->andWhere($qb->expr()->like('Project.description', $qb->expr()->literal($form["description"]->getData() . '%')));
        if($form["createDate"]->getData()!=null)
            $qb->andWhere($qb->expr()->like('Project.createDate', $qb->expr()->literal($form["createDate"]->getData() . '%')));
        if($form["endDate"]->getData()!=null)
            $qb->andWhere($qb->expr()->like('Project.endDate', $qb->expr()->literal($form["endDate"]->getData() . '%')));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(),
            $this->get('request')->query->get('page', 1) /*page number*/,
            3/*limit per page*/
        );
        return $this->render('GhaenCollegeScrumBundle:Project:index.html.twig', array(
            'entities' => $pagination,
            'form'   => $form->createView(),
        ));
    }
}
