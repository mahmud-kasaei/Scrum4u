<?php

namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GhaenCollege\ScrumBundle\Entity\Backlog;
use GhaenCollege\ScrumBundle\Entity\Status;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        //return $this->render('GhaenCollegeScrumBundle::index.html.twig', array('name' => $name));
        return $this->render('GhaenCollegeScrumBundle:Parent:layout.html.twig', array('name' => $name));
    }
    public function admin_indexAction()
    {
        //return $this->render('GhaenCollegeScrumBundle::index.html.twig', array('name' => $name));
        return $this->render('GhaenCollegeScrumBundle:Parent:layout.html.twig');
    }
    public function product_planningAction()
    {
        return $this->render('GhaenCollegeScrumBundle::product_planning.html.twig');
    }
    public function test_graphAction()
    {
        return $this->render('GhaenCollegeScrumBundle:dashboard:BasicDataXML.php');
    }
    public function work_toolsAction()
    {
        return $this->render('GhaenCollegeScrumBundle:dashboard:work_tools.html.twig');
    }
    public function story_boardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->findAll();
        return $this->render('GhaenCollegeScrumBundle:sprint_tracking:story_board.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function task_boardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->findAll();
        return $this->render('GhaenCollegeScrumBundle:sprint_tracking:task_board.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function subscriptionsAction()
    {
        return $this->render('GhaenCollegeScrumBundle:dashboard:subscriptions.html.twig');
    }
    public function inboxAction()
    {
        return $this->render('GhaenCollegeScrumBundle:dashboard:inbox.html.twig');
    }
    public function scrumAction()
    {
        return $this->render('GhaenCollegeScrumBundle::default.html.twig');
    }
    public function home_pageAction()
    {
        return $this->render('GhaenCollegeScrumBundle:Parent:layout.html.twig');
    }
    public function backlogAction()
    {
        return $this->render('GhaenCollegeScrumBundle:product_planning:backlog.html.twig');
    }
    public function epicsAction()
    {
        return $this->render('GhaenCollegeScrumBundle:product_planning:epics.html.twig');
    }

    public function story_AJAXAction()
    {
        $story_id = $this->get('request')->request->get('story');
        $status_id = $this->get('request')->request->get('status');
        $em = $this->getDoctrine()->getManager();
        $status = new Status();
        $entity=new Backlog();
        if($status_id!=0)
            $status = $em->getRepository('GhaenCollegeScrumBundle:Status')->find($status_id);
        $entity = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($story_id);
        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Backlog entity.');
        }
        $entity->setStatus($status);
        $em->persist($entity);
        $em->flush();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('GhaenCollegeScrumBundle:Backlog')->findAll();
        return $this->render('GhaenCollegeScrumBundle:sprint_tracking:story_board.html.twig', array(
            'entities' => $entities,
        ));
    }

}
