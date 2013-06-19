<?php
namespace GhaenCollege\ScrumBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        // add your custom field
        $builder->add('firstname',null,  array('label' => 'form.Firstname', 'translation_domain' => 'FOSUserBundle'))
                 ->add('lastname',null,  array('label' => 'form.Lastname', 'translation_domain' => 'FOSUserBundle'))
                 ->add('usergroups', null, array('required' => false))
                 ->add('file')
        ;
    }
    public function getName()
    {
        return 'ghaencollege_user_registration';
    }
}