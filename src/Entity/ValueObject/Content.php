<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Entity\ValueObject;

class Content
{
    private readonly string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
