<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\entities\Livres;
use App\models\repositories\AuteursRepository;
use App\models\repositories\CategoriesRepository;
use App\models\repositories\LivresRepository;
use JasonGrimes\Paginator;
use Michelf\MarkdownExtra;

class LivresController extends BaseController
{
  const NBR_ARTICLES = 12;

  protected static function getRepo(): LivresRepository
  {
    return new LivresRepository;
  }

  public function getAllLivres(int $page): array
  {
    return LivresController::getRepo()->getAllOfLivreViewByPage(($page - 1) * 12, LivresController::NBR_ARTICLES);
  }

  public function getLivres(int $id): array
  {
    return LivresController::getRepo()->getOfLivreViewById($id);
  }

  public function getCount()
  {
    $count = LivresController::getRepo()->getCount();

    return $count["COUNT(id)"];
  }

  public function processDataAllLivres(array $data): array
  {
    foreach ($data as $value) {
      $value["livres"]->setSynopsis(MarkdownExtra::defaultTransform($value["livres"]->getSynopsis()));
    }

    return $data;
  }

  public function processDataOneLivres(array $data): array
  {
    $data["livres"]->setSynopsis(MarkdownExtra::defaultTransform($data["livres"]->getSynopsis()));

    return $data;
  }

  public function pagination(int $total, int $currentPage, ): object
  {
    $paginator = new Paginator($total, LivresController::NBR_ARTICLES, $currentPage, "/livres?page=(:num)");

    return $paginator;
  }

  public function modify(string $id): void
  {
    $this->checkSession();
    $this->checkRole();

    $data = $this->getLivres(intval($id));

    if (isset($_POST["titre"])) {
      $data["livres"]->setTitre($_POST["titre"]);
      $data["livres"]->setAnnee_publication(intval($_POST["annee_publication"]));
      $data["livres"]->setIsbn($_POST["isbn"]);
      $data["livres"]->setDisponible(boolval($_POST["disponible"]));
      $data["livres"]->setSynopsis($_POST["synopsis"]);

      $result = LivresController::getRepo()->updateById($data["livres"]);

      if ($result) {
        header("Location: /livres/" . $data["livres"]->getId());
      } else {
        echo "Update échoué";
      }
    }

    echo $this->twig->render("livres/modify.html.twig", [
      "data" => $data,
      "login" => $this->getLogin(),
    ]);
  }

  public function delete()
  {
    $this->checkSession();
    $this->checkRole();

    if (isset($_GET["id"])) {
      $result = LivresController::getRepo()->deleteById(intval($_GET["id"]));

      if ($result) {
        header("Location: /livres");
      }
    } else {
      $id = $_GET["id"];
      header("Location: /livres/$id");
    }
  }

  public function add(): void
  {
    $this->checkSession();
    $this->checkRole();

    if (isset($_POST["titre"])) {
      $livre = new Livres();
      $livre->setTitre($_POST["titre"])
        ->setAuteur_id(intval($_POST["auteur"]))
        ->setCategorie_id(intval($_POST["categorie"]))
        ->setAnnee_publication(intval($_POST["annee_publication"]))
        ->setIsbn($_POST["isbn"])
        ->setDisponible(boolval($_POST["disponible"]))
        ->setSynopsis($_POST["synopsis"]);

      $result = LivresController::getRepo()->create($livre);

      if ($result) {
        header("Location: /livres");
      } else {
        echo "Ajout échoué";
      }
    }

    $auteursRepo = new AuteursRepository();
    $categoriesRepo = new CategoriesRepository();

    $data["auteurs"] = $auteursRepo->getAll();
    $data["categories"] = $categoriesRepo->getAll();

    echo $this->twig->render("livres/add.html.twig", [
      "data" => $data,
      "login" => $this->getLogin(),
    ]);
  }

  public function livres(string $id): void
  {
    $this->checkSession();

    $data = $this->getLivres(intval($id));
    $data = $this->processDataOneLivres($data);

    echo $this->twig->render("livres/livres.html.twig", [
      "data" => $data,
      "login" => $this->getLogin(),
      "role" => $_SESSION["role"],
    ]);
  }

  public function index(): void
  {
    $this->checkSession();

    isset($_GET["page"]) ? $currentPage = $_GET["page"] : $currentPage = 1;

    $data = $this->getAllLivres(intval($currentPage));
    $data = $this->processDataAllLivres($data);

    $total = $this->getCount();
    $paginator = $this->pagination($total, intval($currentPage));

    echo $this->twig->render("livres/index.html.twig", [
      "data" => $data,
      "paginator" => $paginator,
      "login" => $this->getLogin(),
      "role" => $_SESSION["role"],
    ]);
  }
}
