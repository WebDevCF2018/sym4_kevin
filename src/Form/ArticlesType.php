<?php

namespace App\Form;

use App\Entity\Lesports;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('letitre')
            ->add('letextes')
            ->add('ladates')
            ->add('lauteurlauteur')
            ->add('stylesstyles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lesports::class,
        ]);
    }
}
