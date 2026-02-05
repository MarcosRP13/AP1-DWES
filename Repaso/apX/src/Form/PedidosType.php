<?php

namespace App\Form;

use App\Entity\Camareros;
use App\Entity\Clientes;
use App\Entity\Pedidos;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PedidosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_order',DateType::class, ['label' => 'Fecha de pedido'])
            ->add('date_ent', DateType::class, ['label' => 'Fecha de entrega'])
            ->add('quantity', TextType::class, ['label' => 'Cantidad'])
            ->add('state', ChoiceType::class, ['label' => 'Estado', 'choices' => ['Confirmado' => 'Confirmado', 'Prepado' => 'Prepado', 'Servido' => 'Servido', 'Cancelado' => 'Cancelado']])
            ->add('observation' ,TextType::class, ['label' => 'Observaciones'])
            ->add('client_id', EntityType::class, [
                'class' => Clientes::class,
                'choice_label' => 'name',
            ])
            ->add('waiter_id', EntityType::class, [
                'class' => Camareros::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pedidos::class,
        ]);
    }
}
