<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Presentation;

use Kzmshx\PhpCacheableViewmodel\Entity\Task;
use Kzmshx\PhpCacheableViewmodel\Presentation\Trait\UseInstanceCacheTrait;

class TaskViewModel
{
    use UseInstanceCacheTrait;

    private readonly Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getContent(): string
    {
        return $this->useInstanceCache(__FUNCTION__, fn() => $this->task->getContent()->getValue());
    }

    public function getStatus(): StatusViewModel
    {
        return $this->useInstanceCache(__FUNCTION__, fn() => new StatusViewModel($this->task->getStatus()));
    }

    public function getDueDate(): DueDateViewModel
    {
        return new DueDateViewModel($this->task->getDueDate());
    }
}
