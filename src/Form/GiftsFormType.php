<?php

namespace App\Form;

use App\Entity\Gifts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class GiftsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', TextType::class, [
                "attr" => [
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Ton prénom'
                ],
                "label" => "Qui es-tu ?"
            ])
            ->add('quality', TextType::class, [
                'attr' => [
                    'class' => "form-control mb-4",
                    'placeholder' => 'Sa qualité'
                ],
                'label' => 'c\'est quoi sa meilleure qualité ?'
            ])
            ->add('description', TextareaType::class, [
                "attr" => [
                    'rows' => 20,
                    'class' => "form-control",
                    'placeholder' => 'Un petit poème par exemple ?'
                ],
                "label" => "Ecrit ce que tu veux lui dire !"
            ])
            // ->add('file', FileType::class, [
            //     'attr' => [
            //         'class' => 'form-control'
            //     ],
            //     'mapped' => false,
            //     'required' => false,
            //     'label' => 'Télécharger une photo',
            //     'constraints' => [
            //         new File([
            //             'maxSize'=> "500M",
            //             'maxSizeMessage' => 'Le fichier est trop volumineux, le maximum autorisé est {{ limit }} {{ suffix }}'
            //         ])
            //     ]
            // ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary my-3'
                ],
                'label' => 'Envoyer !'
            ])
            // ->add('created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gifts::class,
        ]);
    }
}
