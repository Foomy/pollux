<?php

namespace App\Form;

use App\Movie\DataTransfer as MovieData;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Uid\Uuid;

class MovieType extends \Symfony\Component\Form\AbstractType
{
    public function __construct()
    {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MovieData::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class, [
                'data' => Uuid::v4(),
            ])
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('originalTitle', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('cast', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('director', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('writer', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('additionalInfo', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('duration', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'min' => 1,
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('releaseYear', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'min' => 1,
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('blurb', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('genre', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label_attr' => [
                    'class' => 'input-group-text',
                ]
            ])
            ->add('directorsCut', CheckboxType::class, [
                'required' => false,
            ])
            ->add('medium', ChoiceType::class, [
                'choices' => [
                    'DVD' => 1,
                    'Blu-Ray' => 2,
                    'Book' => 3,
                ]
            ])
//            ->add('lentTo', ChoiceType::class, [
//                'choices' => []
//            ])
//            ->add('lentSince', TextType::class, [
//                'attr' => [
//                    'class' => 'form-control',
//                ],
//                'label_attr' => [
//                    'class' => 'input-group-text',
//                ],
//            ])
            ->add('save', SubmitType::class, [
                'label' => 'Add Movie',
                'attr' => [
                    'class' => 'js-btn-add btn btn-success',
                ],
            ]);
    }
}