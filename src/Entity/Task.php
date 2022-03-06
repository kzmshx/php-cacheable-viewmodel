<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Entity;

use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\Content;
use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\DueDate;
use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\Status;

class Task
{
    private string $id = '';
    private Content $content;
    private Status $status;
    private ?DueDate $dueDate;

    public function __construct(
        Content $content,
        Status $status,
        ?DueDate $dueDate
    ) {
        $this->content = $content;
        $this->status = $status;
        $this->dueDate = $dueDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getContent(): Content
    {
        return $this->content;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getDueDate(): ?DueDate
    {
        return $this->dueDate;
    }
}
