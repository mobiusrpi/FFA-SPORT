<?php

namespace App\Form;

use App\Entity\Crews;
use App\Entity\Competitors;
use App\Entity\Competitions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CrewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pilote', EntityType::class, [
                'class' => Competitors::class,
                'choice_label' => 'licence,lastname',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-label mt-4'
                 ],
                 'label' => 'Pilote',             ])
            ->add('pilote', EntityType::class, [
                'class' => Competitors::class,
                'choice_label' => 'licence,lastname',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-label mt-4'
                 ],
                 'label' => 'Navigateur',             
            ])
            ->add('category')
            ->add('callsign')
            ->add('aircraftSpeed')
            ->add('aircraftType')
            ->add('aircraftFlyingclub')
            ->add('aircraftSharing')
            ->add('pilotShared')
            ->add('payment')
            ->add('competition', EntityType::class, [
                'class' => Competitions::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])        
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'Valider',           
           ]);   
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crews::class,
        ]);
    }
}
