<?php

declare(strict_types=1);

namespace App\Entities;

abstract class Task {
    protected ?int $id = null;
    protected string $title;
    protected ?string $description;
    protected int $projectId;
    protected ?int $assigneeId;
    protected int $reporterId;
    protected string $priority;
    protected string $status;
    protected ?float $estimatedHours;
    protected float $actualHours;
    protected ?string $dueDate;
    protected string $createdAt;
    protected string $updatedAt;

    public function __construct(string $title, ?string $description,  int $projectId, int $reporterId,  string $priority = 'medium', string $status = 'todo', ?float $estimatedHours = null, ?string $dueDate = null) {
       
        $this->title = $title;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->reporterId = $reporterId;
        $this->priority = $priority;
        $this->status = $status;
        $this->estimatedHours = $estimatedHours;
        $this->actualHours = 0.0;
        $this->dueDate = $dueDate;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

 abstract public function calculateComplexity();
 abstract public function getRequiredSkills();

}