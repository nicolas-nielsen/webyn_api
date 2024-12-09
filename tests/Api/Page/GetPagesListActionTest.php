<?php

declare(strict_types=1);

namespace App\Tests\Api\Page;

use App\Tests\Api\ApiTestCase;
use Symfony\Component\HttpFoundation\Request;

class GetPagesListActionTest extends ApiTestCase
{
    private const RESOURCE_URI = '/api/traffic';

    public function testInvoke(): void
    {
        $this->response = $this->getClient()->request(
            Request::METHOD_GET,
            self::RESOURCE_URI
        );

        $this->responseCodeIs(200);
        $this->responseIsJson();
        $this->assertCount(5, json_decode($this->response->getContent()));
        $this->responseContainsJson([
            0 => [
                'page_id' => 1,
                'page_url' => '/home',
                'traffic' => 125
            ],
            1 => [
                'page_id' => 2,
                'page_url' => '/about',
                'traffic' => 80
            ],
            2 => [
                'page_id' => 3,
                'page_url' => '/products',
                'traffic' => 300
            ],
            3 => [
                'page_id' => 4,
                'page_url' => '/contact',
                'traffic' => 45
            ],
            4 => [
                'page_id' => 5,
                'page_url' => '/blog',
                'traffic' => 95
            ],
        ]);
    }
}
