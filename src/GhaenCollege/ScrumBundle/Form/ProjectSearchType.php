<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text',array('required'=>false))
            ->add('description','text',array('required'=>false))
            ->add('createDate','text',array('required'=>false))
            ->add('startDate','text',array('required'=>false))
            ->add('endDate','text',array('required'=>false))
            ->add('parent','choice',array('required'=>false))
            ->add('status','choice',array('required'=>false))
            ->add('schedule','choice',array('required'=>false))
            ->add('builder','choice',array('required'=>false))
            ->add('productOwner','choice',array('required'=>false))
        ;
    }



    public function getName()
    {
        return 'ghaencollege_scrumbundle_projectsearchtype';
    }
}
