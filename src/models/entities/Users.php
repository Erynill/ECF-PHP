<?php
declare (strict_types = 1);

namespace App\models\entities;

use DateTime;
use Exception;

class Users
{
  private ?int $id = null;
  private string $username = "";
  private string $password = "";
  private string $role = "";
  private ?DateTime $created_at = null;

  /**
   * Get the value of id
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of username
   */
  public function getUsername(): string
  {
    return $this->username;
  }

  /**
   * Set the value of username
   *
   * @return  self
   */
  public function setUsername(string $username): self
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword(string $password): self
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);

    return $this;
  }

  /**
   * Get the value of role
   */
  public function getRole(): string
  {
    return $this->role;
  }

  /**
   * Set the value of role
   *
   * @return  self
   */
  public function setRole(string $role): self
  {
    if (!$role === "user" || !$role === "admin") {
      throw new Exception("Le rôle ne correspond pas, soit admin ou user");
    } else {
      $this->role = $role;
    }

    return $this;
  }

  /**
   * Get the value of created_at
   */
  public function getCreated_at(): DateTime
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @return  self
   */
  public function setCreated_at(DateTime $created_at): self
  {
    $this->created_at = $created_at;

    return $this;
  }
}
