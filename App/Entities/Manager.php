<?php
namespace App\Entities;
class Manager extends TeamMember {
    
 public function __construct($username,$password,$description,$teamId){
        parent::__construct($username,$password,$description,$teamId);

    }



    public function canCreateProject(): bool 
    {
        return true; 
    }

    public function canAssignTasks(): bool 
    {
        return true;
    }

    public function getRolePermissions(): array 
    {
        return [
            'view_tasks',
            'update_task_status',
            'add_comments',
            'supprimer_member'
        ];
    }
}