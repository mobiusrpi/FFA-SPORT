<?php

namespace App\Form;

use App\Entity\Crews;
use App\Entity\Competitors;
use App\Entity\Enum\Category;
use App\Entity\Enum\SpeedList;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CrewsType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
    
        $builder
            ->add('pilot', EntityType::class, [
                'class' => Competitors::class,
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('competitor')            
                        ->orderBy('competitor.lastname', 'ASC');
                },			
                'choice_label' => 'fullname',
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control',                    
                ],
                'label' => 'Pilote :',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'placeholder' =>'Selectionner un adhérent'
            ])
            ->add('navigator', EntityType::class, [
                'class' => Competitors::class,
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('competitor')            
                        ->orderBy('competitor.lastname', 'ASC');
                },			
                'choice_label' => 'fullname',                
                'attr' => [
                'class' => 'form-control',                    
                ],                
                'label' => 'Navigateur :',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'by_reference' => false,
            'placeholder' =>'Selectionner un adhérent'
                ])   
            ->add('category',EnumType::class,[
                'class' => Category::class,                
                'choice_label' => function (
                    $choice, 
                    string $key, 
                    mixed $value
                ): TranslatableMessage|string {
                    return $value;  
                },
                'attr' => [
                    'class' => 'form-control',                    
                    'id' => 'Select1',            
                ],
                'label' => 'Catégorie',
                'label_attr' => [
                    'class' => 'form-label'
                ],               
//                'placeholder'=>'Selectionner une catégorie'
            ])
            ->add('callsign',TextType::class,[
                'attr' => [
                    'class' => 'form-control',                    
                    'maxlength' => '8'
                ],                
                'required' => false,
                'label' => 'Immatriculation',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('aircraftSpeed',EnumType::class,[
                'class' => SpeedList::class,
                'choice_label' => function (
                        $choice, 
                        string $key, 
                        mixed $value
                    ): TranslatableMessage|string {
                        return $value;  
                    },
                'attr' => [
                   'class' => 'form-control',                    
                ],
               'label' => 'Vitesse en kt',
                'label_attr' => [
                    'class' => 'form-label'
                ]                
            ])
            ->add('aircraftType',TextType::class,[
                'attr' => [
                    'class' => 'form-control',                    
                    'maxlength' => '20'
                ],
                'required' => false,                
                'label' => 'Type d\'avion',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('aircraftFlyingclub',TextType::class,[
                'attr' => [
                    'class' => 'form-control',                    
                    'maxlength' => '30'
                ],                
                'required' => false,
                'label' => 'Aéroclub de l\'avion',
                'label_attr' => [
                    'class' => 'form-label'
                ],
            ])
            ->add('aircraftSharing',CheckboxType::class,[   
                'attr' => [
                    'class' => 'form-check-input',                    
                    'role' => 'switch',
                    //                    'checked'   => 'unchecked'

                ],                
                'required' => false,
                'label'    => 'Partage de l\'avion',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
            ])      
            ->add('submit', SubmitType::class, [             
                'attr' => [
                    'class' => 'btn btn-primary mt-4'              
                ],  
                'label' => 'Valider', 
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Crews::class,
        ]);
    }
}
