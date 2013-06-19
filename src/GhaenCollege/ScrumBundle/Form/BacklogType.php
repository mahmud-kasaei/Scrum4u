<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BacklogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', null, array('required' => false))
            ->add('estimate', null, array('required' => false))
            ->add('realtime', null, array('required' => false))
            ->add('importance', null, array('required' => false))
            ->add('howItsDemo', null, array('required' => false))
            ->add('createDate', null, array('required' => false))
            ->add('startDate', null, array('required' => false))
            ->add('endDate', null, array('required' => false))
            ->add('sprint', null, array('required' => false))
            ->add('project', null, array('required' => false))
            ->add('epic', null, array('required' => false))
            ->add('status', null, array('required' => false))
            ->add('responsible', null, array('required' => false))
            ->add('builder', null, array('required' => false))
            ->add('tasks', null, array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\Backlog'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_backlogtype';
    }
}
