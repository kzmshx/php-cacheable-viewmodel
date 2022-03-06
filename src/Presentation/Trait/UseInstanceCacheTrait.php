<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Presentation\Trait;

trait UseInstanceCacheTrait
{
    /**
     * @var array<string, mixed>
     */
    private array $instanceCache = [];

    /**
     * @template T
     * @param string $key
     * @param callable(): T $callback
     * @return T
     */
    private function useInstanceCache(string $key, callable $callback): mixed
    {
        return $this->instanceCache[$key] ?? $this->instanceCache[$key] = $callback();
    }
}
