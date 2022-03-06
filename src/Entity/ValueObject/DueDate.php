<?php

namespace Kzmshx\PhpCacheableViewmodel\Entity\ValueObject;

use DateTimeImmutable;

class DueDate
{
    private readonly DateTimeImmutable $value;

    public function __construct(DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }
}
