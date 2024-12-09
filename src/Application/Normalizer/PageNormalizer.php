<?php

declare(strict_types=1);

namespace App\Application\Normalizer;

use App\Domain\Page\Page;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

#[AutoconfigureTag('serializer.normalizer')]
class PageNormalizer implements NormalizerInterface
{
    public function __construct(
        #[Autowire(service: 'serializer.normalizer.object')]
        private readonly NormalizerInterface $normalizer,
    ) {
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = $this->normalizer->normalize($data, $format, $context);

        return [
            'page_id' => $data['id'],
            'page_url' => $data['url'],
            'traffic' => $data['traffic'],
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Page;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Page::class => true
        ];
    }
}
