<?php

namespace App\Api;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetArticleAction extends BaseApiAction
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    #[Route('/api/article/{id}', name: 'api_article_get', methods: ['GET'])]
    public function __invoke(int $id): JsonResponse
    {
        $article = $this->articleRepository->find($id);

        if (!$article) {
            return $this->notFoundResponse('Article not found');
        }

        $data = [
            'id' => $article->getId(),
            'name' => $article->getName(),
            'code' => $article->getCode(),
            'price' => $article->getPrice(),
        ];

        return $this->jsonResponse($data);
    }
}
