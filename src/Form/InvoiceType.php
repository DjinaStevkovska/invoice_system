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
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'name', // Customize the display label for customers
                'label' => 'Customer',
            ])
            ->add('customer_address', TextType::class, [
                'label' => 'Customer Address',
                'mapped' => false, // This field is not mapped to an entity property
                'required' => false, // You may set this to true if address is always required
                'attr' => [
                    'readonly' => 'readonly', // Make it read-only
                ],
            ])
//            ->add('customerName', TextType::class, [
//                'label' => 'Customer Name',
//                'disabled' => true,
//                'mapped' => false, // Not mapped to an entity property
//                'data' => $options['data']->getCustomerName(), // Set the initial value from the virtual property
//            ])
//            ->add('customerEmail', TextType::class, [
//                'label' => 'Customer Email',
//                'disabled' => true,
//                'mapped' => false,
//            ])
//            ->add('customerAddress', TextType::class, [
//                'label' => 'Customer Address',
//                'mapped' => false,
//                'disabled' => true,
//            ])
//            ->add('invoiceItems', EntityType::class, [
//                'class' => InvoiceItem::class,
//                'multiple' => true, // Allow selecting multiple invoice items if needed
//                'label' => 'Invoice Items',
//            ])
            ->add('invoiceItems', CollectionType::class, [
                'entry_type' => InvoiceItemType::class,
                'label' => 'Invoice Items',
                'allow_add' => true, // Allow adding new items dynamically
                'by_reference' => false, // Pass items by reference to update the entity
            ])
            ->add('totalPrice', NumberType::class, [
                'label' => 'Total Price',
            ])
            ->add('dueDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Due Date',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
