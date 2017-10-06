<?php
// src/AppBundle/Form/TaskType.php
namespace IABundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormularioInicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('minSup', TextType::class)
		  ->add('minConf', TextType::class)
          ->add('ejecutar', SubmitType::class, array('label' => 'Ejecutar '))
	     ->getForm();
        ;
    }
}