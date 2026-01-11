<?php
namespace  App\Entities;

abstract class TeamMember
{
    protected ?int $id;
    protected string $username;
    protected string $email;
    protected string $password;
    protected int $teamId;
    protected string $createdAt;

    public function __construct(string $username, string $email, string $password, int $teamId) {
        $this->username = $username;
        $this->email = $email;
        $this->password=$password;
        $this->teamId = $teamId;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    abstract public function canCreateProject(): bool;
    abstract public function canAssignTasks(): bool;
    abstract public function getRolePermissions(): array;
}