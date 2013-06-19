<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('estimate')
            ->add('real')
            ->add('createDate')
            ->add('startDate')
            ->add('endDate')
            ->add('backlog')
            ->add('status')
            ->add('responsible')
            ->add('builder')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\Task'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_tasktype';
    }
}
