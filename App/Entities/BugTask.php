<?php
use App\Entities;
require_once __DIR__ . "/app/Entities/Task.php";
class BugTask extends Task {
   

public function __construct( $title,  $description=null, $projectId,  $reporterId,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null){   
    parent:: __construct( $title,  $description=null, $projectId,  $reporterId,   $priority = 'medium',  $status = 'todo',  $estimatedHours = null,  $dueDate = null);
}

}