<?php

namespace App\Form;

use App\Entity\Invoice;
use App\Entity\NewInvoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewInvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('invoiceNumber', TextType::class)
            ->add('status', TextType::class)
            ->add('companyName', TextType::class)
            ->add('companyAddress', TextareaType::class)
            ->add('companyEmail', EmailType::class)
            ->add('companyPhone', TextType::class)
            ->add('billedToName', TextType::class)
            ->add('billedToAddress', TextareaType::class)
            ->add('billedToEmail', EmailType::class)
            ->add('billedToPhone', TextType::class)
            ->add('invoiceNo', TextType::class)
            ->add('invoiceDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('orderNo', TextType::class)
            ->add('invoiceItems', TextType::class) // array collection
            ->add('subTotal', MoneyType::class)
            ->add('discount', MoneyType::class)
            ->add('shippingCharge', MoneyType::class)
            ->add('tax', MoneyType::class)
            ->add('total', MoneyType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Save Invoice',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewInvoice::class,

        ]);
    }
}
