<?php

namespace App\Form;

use App\Entity\Clientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('lastName', TextType::class, ['label' => 'Apellido'])
            ->add('dni', TextType::class, ['label' => 'DNI'])
            ->add('telephone', TextType::class, ['label' => 'Telefono'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('date_register', DateType::class, ['label' => 'Fecha de nacimiento'])
            ->add('vip', CheckboxType::class, ['label' => 'VIP'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clientes::class,
        ]);
    }
}
