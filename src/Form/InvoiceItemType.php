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
            ->add('article', EntityType::class, [
                'class' => Article::class,
                'choice_label' => 'name',
                'label' => 'Article',
            ])
            ->add('price', TextType::class, ['label' => 'Item Price'])
            ->add('quantity', IntegerType::class, ['label' => 'Quantity'])
            ->add('totalPrice', NumberType::class, ['label' => 'Total Price']);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceItem::class,
            'attr' => ['class' => 'custom-invoice-item-form'], // Add a custom CSS class to the form
//            'block_prefix' => 'invoice_item_type'
        ]);
    }
}
