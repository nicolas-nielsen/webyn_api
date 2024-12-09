<?php

declare(strict_types=1);

namespace App\Domain\Page\Service;

use App\Domain\Page\Repository\PageRepositoryInterface;

readonly class PageService
{
    public function __construct(private PageRepositoryInterface $pageRepository)
    {
    }

    public function getPagesList(): array
    {
        return $this->pageRepository->getAll();
    }
}
