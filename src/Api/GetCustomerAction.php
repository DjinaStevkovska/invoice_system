<?php

namespace App\Api;

use App\Repository\CustomerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetCustomerAction extends BaseApiAction
{
    public function __construct(private readonly CustomerRepository $customerRepository)
    {
    }

    #[Route('/api/customer/{id}', name: 'api_customer_get', methods: ['GET'])]
    public function __invoke(int $id): JsonResponse
    {
        $customer = $this->customerRepository->find($id);

        if (!$customer) {
            return $this->notFoundResponse('Customer not found');
        }

        $data = [
            'id' => $customer->getId(),
            'name' => $customer->getName(),
            'email' => $customer->getEmail(),
            'address' => $customer->getAddress(),
        ];

        return $this->jsonResponse($data);
    }
}
