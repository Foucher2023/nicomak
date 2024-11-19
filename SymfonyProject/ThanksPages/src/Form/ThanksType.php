<?php

namespace App\Form;

use App\Entity\Thanks;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThanksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TksBy',EntityType::class,['class'=>User::class,'choice_label' => 'name', 'label' => 'De quel salarié il provient',])
            ->add('Text',null,['label' => 'Pourquoi le salarié est remercié',])
            ->add('TksFor',EntityType::class,['class'=>User::class,'choice_label' => 'name', 'label' => 'Quel salarié est remercié',])
            ->add('TkDate',null,['label' => 'Date du remerciement', 'widget' => 'single_text',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Thanks::class,
        ]);
    }
}
