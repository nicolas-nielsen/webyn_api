<?php

declare(strict_types=1);

namespace App\Infrastructure\ORM\Repository;

use App\Domain\Page\Page;
use App\Domain\Page\Repository\PageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PageRepository extends ServiceEntityRepository implements PageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }
}
