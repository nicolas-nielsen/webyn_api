<?php

declare(strict_types=1);

namespace App\Domain\Page\Repository;

interface PageRepositoryInterface
{
    public function getAll(): array;
}
