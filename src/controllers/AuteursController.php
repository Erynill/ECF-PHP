<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\entities\Auteurs;
use App\models\repositories\AuteursRepository;
use Michelf\MarkdownExtra;

class AuteursController extends BaseController
{
  const NBR_ARTICLES = 12;

  protected static function getRepo(): AuteursRepository
  {
    return new AuteursRepository;
  }

  public function processDataAllAuteurs(array $data): array
  {
    foreach ($data as $value) {
      $value->setBiographie(MarkdownExtra::defaultTransform($value->getBiographie()));
    }

    return $data;
  }

  public function processOneData(object $data): object
  {
    $data = $data->setBiographie(MarkdownExtra::defaultTransform($data->getBiographie()));

    return $data;
  }

  public function getCount(): int
  {
    $count = AuteursController::getRepo()->getCount();

    return $count["COUNT(id)"];
  }

  public function getAllByPage(int $page): array
  {
    return AuteursController::getRepo()->getAll(($page - 1) * 12, AuteursController::NBR_ARTICLES);
  }

  public function pagination(int $total): float
  {
    $totalPages = ceil($total / AuteursController::NBR_ARTICLES);

    return $totalPages;
  }

  public function delete(): void
  {
    if (isset($_GET["id"])) {
      $result = AuteursController::getRepo()->deleteById(intval($_GET["id"]));

      if ($result) {
        header("Location: /auteurs");
      }
    } else {
      header("Location: /auteurs/" . $_GET["id"]);
    }
  }

  public function add(): void
  {
    if (isset($_POST["prenom"])) {
      $auteur = new Auteurs();
      $auteur->setPrenom($_POST["prenom"])
        ->setNom($_POST["nom"])
        ->setBiographie($_POST["biographie"]);

      $result = AuteursController::getRepo()->create($auteur);

      if ($result) {
        header("Location: /auteurs");
      } else {
        echo "Ajout échoué";
      }
    }

    echo $this->twig->render("auteurs/add.html.twig");
  }

  public function modify(string $id): void
  {
    $data = AuteursController::getRepo()->getById(intval($id));

    if (isset($_POST["nom"])) {
      $data->setNom($_POST["nom"]);
      $data->setPrenom($_POST["prenom"]);
      $data->setBiographie($_POST["biographie"]);

      $result = AuteursController::getRepo()->updateById($data);

      if ($result) {
        header("Location: /auteurs/" . $data->getId());
      } else {
        echo "Update échoué";
      }
    }

    echo $this->twig->render("auteurs/modify.html.twig", [
      "data" => $data,
    ]);
  }

  public function auteurs(string $id): void
  {
    $data = AuteursController::getRepo()->getById(intval($id));
    $data = $this->processOneData($data);

    echo $this->twig->render("auteurs/auteurs.html.twig", [
      "data" => $data,
    ]);
  }

  public function index(): void
  {
    isset($_GET["page"]) ? $currentPage = $_GET["page"] : $currentPage = 1;

    $data = $this->getAllByPage(intval($currentPage));
    $data = $this->processDataAllAuteurs($data);

    $totalPages = $this->pagination($this->getCount());

    echo $this->twig->render("auteurs/index.html.twig", [
      "data" => $data,
      "page" => $totalPages,
    ]);
  }
}
