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

class GiftsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', TextType::class, [
                "attr" => [
                    'class' => 'form-control mb-4'
                ],
                "label" => "Qui es-tu ?"
            ])
            ->add('description', TextareaType::class, [
                "attr" => [
                    'rows' => 20,
                    'class' => "form-control"
                ],
                "label" => "Ecrit ce que tu veux lui dire !"
            ])
            ->add('files', FileType::class, [
                'mapped' => false,
                'required' => false
            ])
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
