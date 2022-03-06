<?php

namespace Kzmshx\PhpCacheableViewmodel\Presentation;

use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\Status;

class StatusViewModel
{
    private readonly Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function getString(): string
    {
        return match ($this->status) {
            Status::NotStarted => '未着手',
            Status::InProgress => '着手中',
            Status::Done => '完了'
        };
    }
}
