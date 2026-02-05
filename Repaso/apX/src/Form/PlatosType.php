<?php

namespace App\Form;

use App\Entity\Camareros;
use App\Entity\Pedidos;
use App\Entity\Platos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
            if (!empty($options['new'])) {
                    $builder->add('name', TextType::class, ['label' => 'Nombre'])
                    ->add('description', TextType::class, ['label' => 'Descripcion'])
                    ->add('price', TextType::class, ['label' => 'Precio'])
                    ->add('category', ChoiceType::class, ['label' => 'Categoria', 'choices' => ['Entrantes' => 'Entrantes', 'Principales' => 'Principales', 'Postres' => 'Postres', 'Bebidas' => 'Bebidas']],)
                    ->add('allergens', TextType::class, ['label' => 'Alergenas'])
                    ->add('time_prep', TextType::class, ['label' => 'Hora de Preparacion'])
                    ->add('stock_dis', TextType::class, ['label' => 'Stock disponible'])
                    ->add('waiter_id', EntityType::class, [
                        'class' => Camareros::class,
                        'choice_label' => 'name',
                    ])
                    ->add('pedidos', EntityType::class, [
                        'class' => Pedidos::class,
                        'choice_label' => 'id',
                    ]);
            }
        if (!empty($options['edit'])) {
            $builder->add('stock_dis', null, ['label' => 'Stock disponible']);

        }
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Platos::class,
            'edit' => false,
            'new' => false,
        ]);
    }
}
