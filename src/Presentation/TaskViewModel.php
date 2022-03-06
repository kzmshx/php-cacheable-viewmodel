<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Presentation;

use Kzmshx\PhpCacheableViewmodel\Entity\Task;
use Kzmshx\PhpCacheableViewmodel\Presentation\Trait\PropertyCacheableTrait;

class TaskViewModel
{
    use PropertyCacheableTrait;

    private readonly Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getContent(): string
    {
        return $this->useCache('content', fn() => $this->task->getContent()->getValue());
    }

    public function getStatus(): StatusViewModel
    {
        return $this->useCache(StatusViewModel::class, fn() => new StatusViewModel($this->task->getStatus()));
    }

    public function getDueDate(): DueDateViewModel
    {
        return new DueDateViewModel($this->task->getDueDate());
    }
}
