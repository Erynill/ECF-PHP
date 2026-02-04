<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Livres;
use Exception;
use PDO;

class LivreRepository extends BaseRepository
{
  public function create(object $data): bool
  {
    if (!$data instanceof Livres) {
      throw new Exception("L'objet donné doit être de la classe Livre");
    } else {
      $query = "INSERT INTO livres (titre, auteur_id, categorie_id, annee_publication, isbn, disponible, synopsis, like)
                VALUES (:titre, :auteur_id, :categorie_id, :annee_publication, :isbn, :disponible, :synopsis, :like)";
      $stmt = $this->db->prepare($query);
      $param = [":titre" => $data->getTitre(), ":auteur_id" => $data->getAuteur_id(), ":categorie_id" => $data->getCategorie_id(), ":annee_publication" => $data->getAnnee_publication(),
        ":isbn" => $data->getIsbn(), ":disponible" => $data->getDisponible(), ":synopsis" => $data->getSynopsis(), ":like" => $data->getLike()];

      return $stmt->execute($param);
    }
  }

  public function getAll(): array
  {
    $query = "SELECT * FROM livres";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Livres::class);
  }

  public function getById(int $id): ?object
  {
    $query = "SELECT * FROM livres WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];
    $stmt->execute($param);

    return $stmt->fetchObject(Livres::class);
  }

  public function updateById(object $data): bool
  {
    if (!$data instanceof Livres) {
      throw new Exception("L'objet doit être de la classe Livre");
    } else {
      $query = "UPDATE livres
                SET titre = :titre, auteur_id = :auteur_id, categorie_id = :categorie_id, annee_publication = :annee_publication, isbn = :isbn, disponible = :disponible, synopsis = :synopsis, like = :like";
      $stmt = $this->db->prepare($query);
      $param = [":titre" => $data->getTitre(), ":auteur_id" => $data->getAuteur_id(), ":categorie_id" => $data->getCategorie_id(), ":annee_publication" => $data->getAnnee_publication(),
        ":isbn" => $data->getIsbn(), ":disponible" => $data->getDisponible(), ":synopsis" => $data->getSynopsis(), ":like" => $data->getLike()];

      return $stmt->execute($param);
    }
  }

  public function deleteById(int $id): bool
  {
    $query = "DELETE FROM livres WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $param = [":id" => $id];

    return $stmt->execute($param);
  }
}
