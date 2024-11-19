<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,['label'=>'nom de l\'utilisateur'])
            ->add('password',null,['label'=>'mot de passe'])
            ->add('img',null,['label'=>'nom de la photo de profile'])
            //idée d'amélioration mettre une dropZone qui récupère la photo souhaité la place au bonne endroit dans les dossiers et affiche le changement avant de revenir a la liste des utilisateurs 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
