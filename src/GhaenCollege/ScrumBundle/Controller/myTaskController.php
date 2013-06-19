<?php
namespace GhaenCollege\ScrumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GhaenCollege\ScrumBundle\Entity\Task;
use GhaenCollege\ScrumBundle\Form\TaskType;

class myTaskController extends Controller
{
public function newAction($story_id)
{
    $entity = new Task();
    $form   = $this->createForm(new TaskType(), $entity);
    return $this->render('GhaenCollegeScrumBundle:Task:new.html.twig', array(
        'story_id'=>$story_id,
        'entity' => $entity,
        'form'   => $form->createView(),
    ));
}
    public function createAction(Request $request)
    {
        $story_id = $this->get('request')->request->get('story_id');
        $em = $this->getDoctrine()->getManager();
        $story= $em->getRepository('GhaenCollegeScrumBundle:Backlog')->find($story_id);
        $entity  = new Task();
        $form = $this->createForm(new TaskType(),$entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity ->setBacklog($story);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('task_show', array('id' => $entity->getId())));
        }
        return $this->render('GhaenCollegeScrumBundle:Task:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}

?>