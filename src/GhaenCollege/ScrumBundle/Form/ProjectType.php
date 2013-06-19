<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('createDate')
            ->add('startDate')
            ->add('endDate')
            ->add('status')
            ->add('schedule')
            ->add('builder')
            ->add('parent')
            ->add('productOwner')
            ->add('members')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\Project'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_projecttype';
    }
}
