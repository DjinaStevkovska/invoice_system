<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Invoice;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //invoice number?
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'name', // Customize the display label for customers
                'label' => 'Customer',
            ])
            ->add('customer_address', TextType::class, [
                'label' => 'Customer Address',
                'mapped' => false,
            ])
            ->add('customer_email', TextType::class, [
                'label' => 'Customer Email',
                'mapped' => false,
            ])
            ->add('invoice_items', CollectionType::class, [
                'entry_type' => InvoiceItemType::class,
                'label' => 'Invoice Items',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false, // Pass items by reference to update the entity
            ])
            ->add('total_price', NumberType::class, [
                'label' => 'Total Price',
            ])
            ->add('due_date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Due Date',
            ]);
    }

//            ->add('invoiceItems', EntityType::class, [
//                'class' => InvoiceItem::class,
//                'multiple' => true, // Allow selecting multiple invoice items if needed
//                'label' => 'Invoice Items',
//            ])
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
