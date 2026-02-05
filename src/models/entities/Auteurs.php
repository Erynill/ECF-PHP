<?php
declare (strict_types = 1);

namespace App\models\entities;

use Exception;

class Auteurs
{
  private ?int $id = null;
  private string $nom = "";
  private string $prenom = "";
  private ?string $biographie = null;

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
    if (strlen($nom) > 255) {
      throw new Exception("Le nom doit faire au maxium 255 caractères");
    } else {
      $this->nom = $nom;
    }

    return $this;
  }

  /**
   * Get the value of prenom
   */
  public function getPrenom(): string
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @return  self
   */
  public function setPrenom(string $prenom): self
  {
    if (strlen($prenom) > 255) {
      throw new Exception("Le prénom doit faire au maximum 255 caractères");
    } else {
      $this->prenom = $prenom;
    }

    return $this;
  }

  /**
   * Get the value of biographie
   */
  public function getBiographie(): string
  {
    return $this->biographie;
  }

  /**
   * Set the value of biographie
   *
   * @return  self
   */
  public function setBiographie(string $biographie): self
  {
    $this->biographie = $biographie;

    return $this;
  }

  public function getProps(): array
  {
    return get_object_vars($this);
  }
}
