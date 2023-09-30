<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\InvoiceItem;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Item Name'])
            ->add('article', EntityType::class, [
                'class' => Article::class,
                'choice_label' => 'name', // Display the article name as the choice label
                'label' => 'Article',
            ])
            ->add('quantity', IntegerType::class, ['label' => 'Quantity'])
            ->add('totalPrice', NumberType::class, ['label' => 'Total Price']);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceItem::class,
        ]);
    }
}
