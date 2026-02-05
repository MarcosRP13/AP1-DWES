<?php

namespace App\Form;

use App\Entity\Camareros;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CamarerosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('lastName', TextType::class, ['label' => 'Apellido'])
            ->add('dni', TextType::class, ['label' => 'DNI'])
            ->add('telephone', TextType::class, ['label' => 'Telefono'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('date_cont', DateType::class, ['label' => 'Fecha de nacimiento'])
            ->add('shift',  ChoiceType::class, ['label' => 'Horario', 'choices' => ['Mañana' => 'Mañana', 'Tarde' => 'Tarde', 'Noche' => 'Noche']],)
            ->add('active', CheckboxType::class, ['label' => 'Activo'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Camareros::class,
        ]);
    }
}
