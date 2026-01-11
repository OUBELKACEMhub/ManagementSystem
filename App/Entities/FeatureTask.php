<?php
namespace App\Entities;


require_once __DIR__."App/Entities/Task.php";
require_once __DIR__."App/Interfaces/Assignable.php";
require_once __DIR__."App/Interfaces/Prioritizable.php";
require_once __DIR__."App/Interfaces/Commentable.php";


class FeatureTask extends Task  implements Assignable, Prioritizable, Commentable {

public function __construct( $title, $projectId,  $reporterId,$description=null,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null){   
  parent:: __construct( $title, $projectId,  $reporterId,$description=null,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null);   

  }

public function assignTo(int $userId): void { $this->assigneeId = $userId; }
public function getAssigneeId(): ?int { return $this->assigneeId; }
public function isAssigned(): bool { return !empty($this->assigneeId); }

public function setPriority(string $priority): void { $this->priority = $priority; }
public function getPriority(): string { return $this->priority; }
public function isUrgent(): bool { return $this->priority === 'high' || $this->priority === 'critical'; }

public function calculateComplexity(): int 
    {
        return match($this->priority) {
            'low' => 1,
            'medium' => 3,
            'high' => 5,
            'critical' => 8,
            default => 2
        };
    }

   
    public function getRequiredSkills(): array 
    {
        return ['debugging', 'testing', 'error_logging'];
    }
}