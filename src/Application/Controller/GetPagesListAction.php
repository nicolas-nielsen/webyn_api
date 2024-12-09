<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Domain\Page\Service\PageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/traffic')]
class GetPagesListAction extends AbstractController
{
    public function __invoke(PageService $pageService, SerializerInterface $serializer): Response
    {
        return $this->json($pageService->getPagesList(), 200, ['Access-Control-Allow-Origin' => 'http://localhost:4200']);
    }
}
