<?php
declare (strict_types = 1);

namespace App\models\repositories;

use App\models\entities\Auteurs;
use App\models\entities\Categories;
use App\models\entities\Livres;
use PDO;

class LivresRepository extends BaseRepository
{
  public function create(Livres $data): bool
  {
    return $this->createBase("livres", $data);
  }

  public function getAll(): array
  {
    return $this->getAllBase("livres", Livres::class);
  }

  public function getById(int $id): ?Livres
  {
    return $this->getByIdBase("livres", Livres::class, $id);
  }

  public function updateById(Livres $data): bool
  {
    return $this->updateByIdBase("livres", $data);
  }

  public function deleteById(int $id): bool
  {
    return $this->deleteByIdBase("livres", $id);
  }

  public function getOfLivreViewByPage(int $page): array
  {
    $query = "SELECT l.id, annee_publication, `like`, synopsis, titre, auteur_id, a.nom AS nom_auteurs, a.prenom, categorie_id, c.nom AS nom_categories
              FROM livres AS l
              LEFT JOIN auteurs AS a
              ON l.auteur_id = a.id
              LEFT JOIN categories AS c
              ON l.categorie_id = c.id
              LIMIT 12
              OFFSET $page";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    $arrayResult = [];
    $i = 0;
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
      $livre = new Livres();
      $livre->setId($row["id"]);
      $livre->setAnnee_publication($row["annee_publication"]);
      $livre->setLike(boolval($row["like"]));
      $livre->setSynopsis($row["synopsis"]);
      $livre->setTitre($row["titre"]);
      $livre->setAuteur_id($row["auteur_id"]);
      $livre->setCategorie_id($row["categorie_id"]);
      $arrayResult[$i][] = $livre;
      $auteur = new Auteurs();
      $auteur->setId($row["auteur_id"]);
      $auteur->setNom($row["nom_auteurs"]);
      $auteur->setPrenom($row["prenom"]);
      $arrayResult[$i][] = $auteur;
      $categorie = new Categories();
      $categorie->setId($row["categorie_id"]);
      $categorie->setNom($row["nom_categories"]);
      $arrayResult[$i][] = $categorie;
      $i++;
    }

    return $arrayResult;
  }
}
