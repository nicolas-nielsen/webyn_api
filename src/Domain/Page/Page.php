<?php

declare(strict_types=1);

namespace App\Domain\Page;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name:'pages')]
class Page
{
    #[Column(type: 'integer')]
    #[Id]
    #[GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[Column]
    private string $url;

    #[Column(type: 'integer')]
    private int $traffic;

    public function __construct(string $url, int $traffic)
    {
        $this->url = $url;
        $this->traffic = $traffic;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTraffic(): int
    {
        return $this->traffic;
    }
}
