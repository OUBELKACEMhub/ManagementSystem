<?php
namespace App\Entities;

use App\Interfaces\Assignable;
use App\Interfaces\Prioritizable;
use App\Interfaces\Commentable;

abstract class Task implements Assignable, Prioritizable, Commentable {
    protected ?int $id;
    protected string $title;
    protected ?string $description;
    protected int $projectId;
    protected ?int $assigneeId;
    protected int $reporterId;
    protected string $priority;
    protected string $status;
    protected ?float $estimatedHours;
    protected float $actualHours = 0.0;
    protected ?string $dueDate;
   
    public function  __construct( $title, $projectId,  $reporterId,$description=null,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null)  
 {
        $this->title = $title;
        $this->projectId = $projectId;
        $this->reporterId = $reporterId;
        $this->description = $description;
        $this->priority = 'medium';
        $this->status = 'todo';
        $this->estimatedHours = $estimatedHours;
        $this->dueDate = $dueDate;
    }

    abstract public function calculateComplexity(): int;
    abstract public function getRequiredSkills(): array;
}