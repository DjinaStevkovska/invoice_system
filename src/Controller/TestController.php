<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(): Response
    {
        $data = [
            'user_name' => 'Djina Stevkovska',
            'welcome_message' => 'Welcome and have a great journey creating invoices!',
            'current_year' => date('Y'),
            'site_name' => 'Invoice System',
        ];
        return $this->render('pages/test.html.twig', $data);
    }
}