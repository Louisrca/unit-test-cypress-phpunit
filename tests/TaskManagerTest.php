<?php

namespace App\Tests;

use App\TaskManager;


use PHPUnit\Framework\TestCase;


class TaskManagerTest extends TestCase
{

    public function testAddTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");
        $this->assertEquals(
            ["Hello I'm the first task"],
            $taskManager->getTasks()
        );
    }

    public function testRemoveTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");

        $taskManager->removeTask(0);

        $this->assertEquals(
            array(),
            $taskManager->getTasks()
        );
    }

    public function testGetTasks()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");
        $taskManager->addTask("Hello I'm the second task");


        $this->assertEquals(
            ["Hello I'm the first task", "Hello I'm the second task"],
            $taskManager->getTasks()
        );
    }

    public function testGetTask()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");

        $this->assertEquals(
            "Hello I'm the first task",
            $taskManager->getTask(0)

        );
    }

    public function testRemoveInvalidIndexThrowsException()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");

        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage("Index de tâche invalide: -1");
        $taskManager->removeTask(-1);
    }

    public function testGetInvalidIndexThrowsException()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello, I'm the first task");

        $this->expectException(\OutOfBoundsException::class);
        $this->expectExceptionMessage("Index de tâche invalide: 1");
        $taskManager->removeTask(1);
    }

    public function testTaskOrderAfterRemoval()
    {
        $taskManager = new TaskManager();
        $taskManager->addTask("Hello I'm the first task");
        $taskManager->addTask("Hello I'm the second task");
        $taskManager->addTask("Hello I'm the third task");

        $taskManager->removeTask(1);

        $this->assertEquals(
            ["Hello I'm the first task", "Hello I'm the third task"],
            $taskManager->getTasks()
        );
    }
}
