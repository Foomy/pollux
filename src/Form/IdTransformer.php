<?php

namespace App\Form;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Uid\Uuid;

class IdTransformer implements DataTransformerInterface
{
    public function transform($value): ?string
    {
        if (null === $value) {
            return null;
        }

        return $value->toRfc4122();
    }

    public function reverseTransform($value): ?Uuid
    {
        if (null === $value) {
            return null;
        }

        return Uuid::fromString($value);
    }
}