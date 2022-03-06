<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Presentation\Trait;

trait PropertyCacheableTrait
{
    /**
     * @var array<string, mixed>
     */
    private array $cache = [];

    /**
     * @template T
     * @param string $key
     * @param callable(): T $callback
     * @return T
     */
    private function useCache(string $key, callable $callback): mixed
    {
        return $this->cache[$key] ?? $this->cache[$key] = $callback();
    }
}
