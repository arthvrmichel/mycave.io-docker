<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BuyingPriceNormalizer implements NormalizerInterface, CacheableSupportsMethodInterface
{
    public function normalize(mixed $object, ?string $format = null, array $context = []): int
    {
        // return number_format(($object / 100), 2, '.') . '€';
        return $object;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        
        return is_int($data);
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
