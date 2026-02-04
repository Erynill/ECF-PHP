<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Auteurs;
use Exception;
use PDO;

class AuteursRepository extends BaseRepository
{
  public function create(object $data): bool
  {
    if (!$data instanceof Auteurs) {
      throw new Exception("L'objet doit être de la classe Auteurs");
    } else {
      $query = "INSERT INTO auteurs (nom, prenom, biographie) VALUES (:nom, :prenom, :biographie)";
      $stmt = $this->db->prepare($query);
      $param = [":nom" => $data->getNom(), ":prenom" => $data->getPrenom(), ":biographie" => $data->getBiographie()];

      return $stmt->execute($param);
    }
  }

  public function getAll(): array
  {
    $query = "SELECT * FROM auteurs";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Auteurs::class);
  }

  public function getById(int $id): ?object
  {
    $query = "SELECT * FROM auteurs WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];
    $stmt->execute($param);

    return $stmt->fetchObject(Auteurs::class);
  }

  public function updateById(object $data): bool
  {
    $query = "UPDATE auteurs SET nom = :nom, prenom = :prenom, biographie = :biographie";
    $stmt = $this->db->prepare($query);
    $param = [":nom" => $data->getNom(), ":prenom" => $data->getPrenom(), ":biographie" => $data->getBiographie()];

    return $stmt->execute($param);
  }

  public function deleteById(int $id): bool
  {
    $query = "DELETE FROM auteurs WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];

    return $stmt->execute($param);
  }
}
