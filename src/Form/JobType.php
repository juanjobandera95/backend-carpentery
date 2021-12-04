<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Category;
use App\Entity\Type;
use App\Form\TypeType;
use App\Form\CategoryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class)
            ->add('description',TextAreaType::class)
            ->add('slug',TextType::class)
            ->add('image')
            ->add('categories',EntityType::class,['class'=>Category::class,'choice_label'=>'nameCategory'])
            ->add('Types',EntityType::class,['class'=>Type::class,'choice_label'=>'nameType'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
