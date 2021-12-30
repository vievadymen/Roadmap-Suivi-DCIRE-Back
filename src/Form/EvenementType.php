<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('thematique')
            ->add('nom')
            ->add('date')
            ->add('lieu')
            ->add('structureOrg')
            ->add('etat')
            ->add('structureConcernee')
            ->add('structure')
            ->add('historiqueEvenement')
            ->add('periodicite')
            ->add('Autorite')
            ->add('Commentaire')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
