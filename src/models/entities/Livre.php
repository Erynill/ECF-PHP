<?php
declare (strict_types = 1);

namespace App\models\entities;

use Exception;

class Livre
{
  private ?int $id = null;
  private string $titre = "";
  private ?int $auteur_id = null;
  private ?int $categorie_id = null;
  private ?int $annee_publication = null;
  private ?string $isbn = null;
  private ?int $disponible = null;
  private ?string $synopsis = null;
  private ?bool $like = null;

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
   * Get the value of titre
   */
  public function getTitre(): string
  {
    return $this->titre;
  }

  /**
   * Set the value of titre
   *
   * @return  self
   */
  public function setTitre(string $titre): self
  {
    if (strlen($titre) > 255) {
      throw new Exception("Le titre doit faire 255 caractères maximum");
    } else {
      $this->titre = $titre;
    }

    return $this;
  }

  /**
   * Get the value of auteur_id
   */
  public function getAuteur_id(): int
  {
    return $this->auteur_id;
  }

  /**
   * Set the value of auteur_id
   *
   * @return  self
   */
  public function setAuteur_id(int $auteur_id): self
  {
    $this->auteur_id = $auteur_id;

    return $this;
  }

  /**
   * Get the value of categorie_id
   */
  public function getCategorie_id(): int
  {
    return $this->categorie_id;
  }

  /**
   * Set the value of categorie_id
   *
   * @return  self
   */
  public function setCategorie_id(int $categorie_id): self
  {
    $this->categorie_id = $categorie_id;

    return $this;
  }

  /**
   * Get the value of annee_publication
   */
  public function getAnnee_publication(): int
  {
    return $this->annee_publication;
  }

  /**
   * Set the value of annee_publication
   *
   * @return  self
   */
  public function setAnnee_publication(int $annee_publication): self
  {
    $this->annee_publication = $annee_publication;

    return $this;
  }

  /**
   * Get the value of isbn
   */
  public function getIsbn(): string
  {
    return $this->isbn;
  }

  /**
   * Set the value of isbn
   *
   * @return  self
   */
  public function setIsbn(string $isbn): self
  {
    if (strlen($isbn) > 20) {
      throw new Exception("L'isbn doit faire 20 caractères maximum");
    } else {
      $this->isbn = $isbn;
    }

    return $this;
  }

  /**
   * Get the value of disponible
   */
  public function getDisponible(): int
  {
    return $this->disponible;
  }

  /**
   * Set the value of disponible
   *
   * @return  self
   */
  public function setDisponible(int $disponible): self
  {
    if ($disponible < 0 || $disponible > 127) {
      throw new Exception("Disponible doit être entre 0 et 127");
    } else {
      $this->disponible = $disponible;
    }

    return $this;
  }

  /**
   * Get the value of synopsis
   */
  public function getSynopsis(): string
  {
    return $this->synopsis;
  }

  /**
   * Set the value of synopsis
   *
   * @return  self
   */
  public function setSynopsis(string $synopsis): self
  {
    $this->synopsis = $synopsis;

    return $this;
  }

  /**
   * Get the value of like
   */
  public function getLike(): bool
  {
    return $this->like;
  }

  /**
   * Set the value of like
   *
   * @return  self
   */
  public function setLike(bool $like): self
  {
    $this->like = $like;

    return $this;
  }
}
