<?php
declare(strict_types=1);

namespace Kzmshx\PhpCacheableViewmodel\Entity\ValueObject;

enum Status
{
    case NotStarted;
    case InProgress;
    case Done;
}
