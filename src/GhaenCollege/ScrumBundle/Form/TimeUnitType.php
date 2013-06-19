<?php

namespace GhaenCollege\ScrumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimeUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GhaenCollege\ScrumBundle\Entity\TimeUnit'
        ));
    }

    public function getName()
    {
        return 'ghaencollege_scrumbundle_timeunittype';
    }
}
