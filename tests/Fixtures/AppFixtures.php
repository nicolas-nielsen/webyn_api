<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use App\Domain\Page\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private array $pages = [];
    public function load(ObjectManager $manager): void
    {
        $this->pages[] = new Page('/home', 125);
        $this->pages[] = new Page('/about', 80);
        $this->pages[] = new Page('/products', 300);
        $this->pages[] = new Page('/contact', 45);
        $this->pages[] = new Page('/blog', 95);

        foreach ($this->pages as $page) {
            $manager->persist($page);
        }

        $manager->flush();
    }
}
