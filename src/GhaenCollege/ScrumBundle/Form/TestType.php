<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('setup')
            ->add('inputs')
            ->add('setps')
            ->add('expectedResult')
            ->add('actualResult')
            ->add('estimate')
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
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\Test'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_testtype';
    }
}
