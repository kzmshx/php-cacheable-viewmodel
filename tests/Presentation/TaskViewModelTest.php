<?php

namespace Tests\Kzmshx\PhpCacheableViewmodel\Presentation;

use Kzmshx\PhpCacheableViewmodel\Entity\Task;
use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\Content;
use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\DueDate;
use Kzmshx\PhpCacheableViewmodel\Entity\ValueObject\Status;
use Kzmshx\PhpCacheableViewmodel\Presentation\TaskViewModel;
use PHPUnit\Framework\TestCase;

class TaskViewModelTest extends TestCase
{
    public function testGetContent_キャッシュが使われる(): void
    {
        $content = $this->createMock(Content::class);
        $content->method('getValue')->willReturn('タスク内容');
        $task = $this->createMock(Task::class);
        $task->method('getContent')->willReturn($content);

        $content->expects(self::once())->method('getValue');

        $vm = new TaskViewModel($task);

        self::assertSame('タスク内容', $vm->getContent());
        self::assertSame('タスク内容', $vm->getContent());
    }

    public function testGetStatus_キャッシュが使われる(): void
    {
        $task = new Task(
            $this->createMock(Content::class),
            Status::NotStarted,
            $this->createMock(DueDate::class)
        );

        $vm = new TaskViewModel($task);

        // 1回目と2回目でインスタンスが同じ
        self::assertSame($vm->getStatus(), $vm->getStatus());
    }

    public function testGetDueDate_キャッシュが使われない(): void
    {
        $task = new Task(
            $this->createMock(Content::class),
            Status::NotStarted,
            $this->createMock(DueDate::class)
        );

        $vm = new TaskViewModel($task);

        // 1回目と2回目でインスタンスが異なる
        self::assertNotSame($vm->getDueDate(), $vm->getDueDate());
    }
}
