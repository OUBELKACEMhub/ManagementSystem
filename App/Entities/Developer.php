<?php
namespace App\Entities;
class Developer extends TeamMember 
{
    public function __construct($username, $email, $password, $teamId) {
        parent::__construct($username, $email, $password, $teamId);
    }

    public function canCreateProject(): bool { return false; }
    public function canAssignTasks(): bool { return false; }
    public function getRolePermissions(): array {
        return ['work_on_tasks'];
    }
}