<?php

namespace App\Controller;

use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    #[Route('/invoice', name: 'app_invoice')]
    public function index(): Response
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }

    /**
     * @Route("/invoice/create", name="invoice_create")
     */
    public function create(Request $request): Response
    {
        // Create a new invoice entity (assuming you have an Invoice entity class)
        $invoice = new Invoice();

        // Create the invoice form
        $form = $this->createForm(CustomerType::class, $invoice);

        // Handle form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save the invoice to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();

            // Redirect to a success page or return a response
            return $this->redirectToRoute('invoice_success');
        }

        // Render the form
        return $this->render('invoice/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
