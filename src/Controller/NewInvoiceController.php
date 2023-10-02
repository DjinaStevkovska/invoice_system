<?php

namespace App\Controller;

use App\Entity\NewInvoice;
use App\Form\NewInvoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewInvoiceController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route('/new-invoice', name: 'new_invoice')]
    public function index(Request $request): Response
    {
        $invoiceForm = new NewInvoice();

        $form = $this->createForm(NewInvoiceType::class, $invoiceForm);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($invoiceForm);
            $this->entityManager->flush();

            return $this->redirectToRoute('invoice_success');
        }

        return $this->render('pages/invoice/new_invoice_template.html.twig', [
            'form' => $form->createView(),
            'invoiceNumber' => $invoiceForm->invoiceNumber,
            'status' => $invoiceForm->status,
            'companyName' => $invoiceForm->companyName,
            'companyAddress' => $invoiceForm->companyAddress,
            'companyEmail' => $invoiceForm->companyEmail,
            'companyPhone' => $invoiceForm->companyPhone,
            'billedToName' => $invoiceForm->billedToName,
            'billedToAddress' => $invoiceForm->billedToAddress,
            'billedToEmail' => $invoiceForm->billedToEmail,
            'billedToPhone' => $invoiceForm->billedToPhone,
            'invoiceNo' => $invoiceForm->invoiceNo,
            'invoiceDate' => $invoiceForm->invoiceDate,
            'orderNo' => $invoiceForm->orderNo,
        ]);
    }
}
