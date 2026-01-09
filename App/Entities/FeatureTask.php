<?php
namespace App\Entities;
require_once __DIR__ . "/app/Entities/Task.php";
use App\Interfaces\Assignable;
use App\Interfaces\Prioritizable;
use App\Interfaces\Commentable;
class FeatureTask extends Task  implements Assignable, Prioritizable, Commentable {
    

public function __construct( $title,  $description=null, $projectId,  $reporterId,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null){   
    parent:: __construct( $title,  $description=null, $projectId,  $reporterId,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null); 
}


public function calculateComplexity(): int { return 5; }
public function getRequiredSkills(): array { return ['PHP', 'Backend']; }

public function assignTo(int $userId): void { $this->assigneeId = $userId; }
public function getAssigneeId(): ?int { return $this->assigneeId; }
public function isAssigned(): bool { return !empty($this->assigneeId); }

public function setPriority(string $priority): void { $this->priority = $priority; }
public function getPriority(): string { return $this->priority; }
    public function isUrgent(): bool { return $this->priority === 'high' || $this->priority === 'critical'; }

    // public function addComment(string $comment): void { 


    // }
    // public function getComments(): array { 

    //  }
}