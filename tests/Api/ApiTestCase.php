<?php

declare(strict_types=1);

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class ApiTestCase extends KernelTestCase
{
    protected const BASE_URI = 'https://localhost:8000/api';

    private HttpClientInterface $client;
    protected ResponseInterface $response;

    protected function getClient(): HttpClientInterface
    {
        $this->client ??= HttpClient::create([
            'base_uri' => self::BASE_URI,
        ]);

        return $this->client;
    }

    protected function responseCodeIs(int $code): void
    {
        $this->assertSame($code, $this->response->getStatusCode());
    }

    protected function responseIsJson(): void
    {
        $this->assertJson($this->response->getContent());
    }

    protected function responseContainsJson(array $json): void
    {
        $this->assertSame($json, json_decode($this->response->getContent(), true, 512, \JSON_THROW_ON_ERROR));
    }
}
