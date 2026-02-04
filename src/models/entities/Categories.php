<?php
declare (strict_types = 1);

namespace App\models\entities;

use Exception;

class Categories
{
  private ?int $id = null;
  private string $nom = "";

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
   * Get the value of nom
   */
  public function getNom(): string
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom(string $nom): self
  {
    if (strlen($nom) > 191) {
      throw new Exception("Le nom doit être au maximum de 191 caractères");
    } else {
      $this->nom = $nom;
    }

    return $this;
  }
}
