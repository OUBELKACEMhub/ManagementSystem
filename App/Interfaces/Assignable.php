<?php
namespace App\Interfaces;

interface Assignable {
    public function assignTo(int $userId): void;
    public function getAssigneeId(): ?int;
    public function isAssigned(): bool;
}