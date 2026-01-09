<?php

declare(strict_types=1);

namespace App\Entities;

abstract class TeamMember
{
        private int $id;
        private string $username;
        private string $password;
        private string $description;
        private int $teamId;
        private DateTime $createdAt ;

    public function __construct($id,$username,$password,$description,$teamId,$createdAt){
     $this->id=$id;
     $this->username=$username;
     $this->password=$password;
     $this->description=$description;
     $this->teamId=$teamId;
     $this->createdAt=$createdAt;
    }


    public function getId(): string { return $this->id; }
    public function getUsername(): string { return $this->username; }
    public function getPassword(): string { return $this->password; }
    public function getDescription(): string { return $this->description; }
    public function getTeamId(): string { return $this->teamId; }
    public function getCreatedAt(): ?DateTime { return $this->createdAt; }


    abstract public  function canCreateProject():bool;
    abstract public  function canAssignTasks():bool;
   abstract public  function getRolePermissions():array;

   public function verifyPassword($password):bool{
    $this->password==$password ? true : false;
   }
    public function setPassword($password){
    $this->password=$password;
    }
  
}