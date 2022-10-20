<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BuyingPriceNormalizer implements NormalizerInterface, CacheableSupportsMethodInterface
{
    public function normalize(mixed $object, ?string $format = null, array $context = [])
    {
        return number_format(($object / 100), 2, '.') . '€';
    }

    public function supportsNormalization(mixed $data, ?string $format = null)
    {
        return is_int($data);
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}