<?php

namespace Kzmshx\PhpCacheableViewmodel\Presentation;

use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\DueDate;

class DueDateViewModel
{
    private readonly ?DueDate $dueDate;

    public function __construct(?DueDate $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getString(): string
    {
        return $this->dueDate
            ? $this->dueDate->getValue()->format('Y-m-d H:i')
            : '締め切りなし';
    }
}
