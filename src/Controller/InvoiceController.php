<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
//    #[Route('/invoice', name: 'app_invoice')]
//    public function index(): Response
//    {
//        return $this->render('invoice/index.html.twig', [
//            'controller_name' => 'InvoiceController',
//        ]);
//    }

    #[Route('/invoice/create', name: 'invoice_create')]
    public function create(Request $request): Response
    {
        $invoice = new Invoice();

        $form = $this->createForm(InvoiceType::class, $invoice);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($invoice);
            $this->entityManager->flush();

            return $this->redirectToRoute('invoice_success');
        }

        return $this->render('pages/invoice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
