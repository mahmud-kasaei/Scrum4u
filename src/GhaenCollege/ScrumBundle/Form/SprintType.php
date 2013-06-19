<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SprintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('goal')
            ->add('presentationDemoDate')
            ->add('title')
            ->add('scrumMeetingTime')
            ->add('scrumMeetingPlace')
            ->add('createDate')
            ->add('startDate')
            ->add('endDate')
            ->add('project')
            ->add('timeunit')
            ->add('schedule')
            ->add('status')
            ->add('builder')
            ->add('team')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\Sprint'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_sprinttype';
    }
}
