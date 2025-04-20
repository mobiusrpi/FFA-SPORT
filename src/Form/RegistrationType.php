<?php

namespace App\Form;

use App\Entity\crews;
use App\Entity\Competitions;
use App\Entity\TypeCompetition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    /**     $typeComp = $options['data'];          
*        dd($typeComp);
*        if ( $typeComp == 2 ){
*            $crewType = 'Pilote';                    
*        }
*        else {
*            $crewType = 'Equipage';
*        }       
*/        
      $crewType = 'Pilote';  
      $builder
            ->add('crews', EntityType::class, [
                'class' => crews::class,
                'choice_label' => 'id',
                'multiple' => true,
                'attr' => [
                   'class' => 'form-label mt-4'
                ],
                'label' => $crewType,   
                'placeholder' =>'Ajouter un concurrent'     
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
            'data_class' => Competitions::class,
        ]);
    }
}
