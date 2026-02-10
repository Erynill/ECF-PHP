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

  public function getAllOfLivreViewByPage(int $page, int $nbrArticle): array
  {
    $query = "SELECT l.id, annee_publication, `like`, synopsis, auteur_id, a.nom AS nom_auteurs, a.prenom, categorie_id, c.nom AS nom_categories
              FROM livres AS l
              LEFT JOIN auteurs AS a
              ON l.auteur_id = a.id
              LEFT JOIN categories AS c
              ON l.categorie_id = c.id
              LIMIT $nbrArticle
              OFFSET $page";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    $arrayResult = [];
    $i = 0;
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
      $livre = new Livres();
      if (isset($row["id"])) {
        $livre->setId($row["id"]);
      }

      if (isset($row["annee_publication"])) {
        $livre->setAnnee_publication($row["annee_publication"]);
      }

      if (isset($row["like"])) {
        $livre->setLike(boolval($row["like"]));
      }

      if (isset($row["synopsis"])) {
        $livre->setSynopsis($row["synopsis"]);
      }

      if (isset($row["auteur_id"])) {
        $livre->setAuteur_id($row["auteur_id"]);
      }

      if (isset($row["categorie_id"])) {
        $livre->setCategorie_id($row["categorie_id"]);
      }

      $arrayResult[$i]["livres"] = $livre;

      $auteur = new Auteurs();
      if (isset($row["auteur_id"])) {
        $auteur->setId($row["auteur_id"]);
      }

      if (isset($row["nom_auteurs"])) {
        $auteur->setNom($row["nom_auteurs"]);
      }

      if (isset($row["prenom"])) {
        $auteur->setPrenom($row["prenom"]);
      }

      $arrayResult[$i]["auteurs"] = $auteur;

      $categorie = new Categories();
      if (isset($row["categorie_id"])) {
        $categorie->setId($row["categorie_id"]);
      }

      if (isset($row["nom_categories"])) {
        $categorie->setNom($row["nom_categories"]);
      }

      $arrayResult[$i]["categories"] = $categorie;

      $i++;
    }

    return $arrayResult;
  }

  public function getOfLivreViewById(int $id): array
  {
    $query = "SELECT l.id, annee_publication, `like`, synopsis, titre, isbn, disponible, auteur_id, a.nom AS nom_auteurs, a.prenom, categorie_id, c.nom AS nom_categories
              FROM livres AS l
              LEFT JOIN auteurs AS a
              ON l.auteur_id = a.id
              LEFT JOIN categories AS c
              ON l.categorie_id = c.id
              WHERE l.id = $id";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    $arrayResult = [];
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
      $livre = new Livres();
      if (isset($row["id"])) {
        $livre->setId($row["id"]);
      }

      if (isset($row["annee_publication"])) {
        $livre->setAnnee_publication($row["annee_publication"]);
      }

      if (isset($row["like"])) {
        $livre->setLike(boolval($row["like"]));
      }

      if (isset($row["synopsis"])) {
        $livre->setSynopsis($row["synopsis"]);
      }

      if (isset($row["titre"])) {
        $livre->setTitre($row["titre"]);
      }

      if (isset($row["isbn"])) {
        $livre->setIsbn($row["isbn"]);
      }

      if (isset($row["disponible"])) {
        $livre->setDisponible(boolval($row["disponible"]));
      }

      if (isset($row["auteur_id"])) {
        $livre->setAuteur_id($row["auteur_id"]);
      }

      if (isset($row["categorie_id"])) {
        $livre->setCategorie_id($row["categorie_id"]);
      }

      $arrayResult["livres"] = $livre;

      $auteur = new Auteurs();
      if (isset($row["auteur_id"])) {
        $auteur->setId($row["auteur_id"]);
      }

      if (isset($row["nom_auteurs"])) {
        $auteur->setNom($row["nom_auteurs"]);
      }

      if (isset($row["prenom"])) {
        $auteur->setPrenom($row["prenom"]);
      }

      $arrayResult["auteurs"] = $auteur;

      $categorie = new Categories();
      if (isset($row["categorie_id"])) {
        $categorie->setId($row["categorie_id"]);
      }

      if (isset($row["nom_categories"])) {
        $categorie->setNom($row["nom_categories"]);
      }

      $arrayResult["categories"] = $categorie;
    }

    return $arrayResult;
  }

  public function getCount(): array
  {
    $query = "SELECT COUNT(id) FROM livres";
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
