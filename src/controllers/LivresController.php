<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\repositories\LivresRepository;
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

  public function transformMarkdownToHtml(array $data): array
  {
    foreach ($data as $value) {
      $value[0]->setSynopsis(MarkdownExtra::defaultTransform($value[0]->getSynopsis()));
    }

    return $data;
  }

  public function pagination(int $total): float
  {
    $totalPages = ceil($total / LivresController::NBR_ARTICLES);

    return $totalPages;
  }

  public function livres(string $id): void
  {
    $data = $this->getLivres(intval($id));
    $data = $this->transformMarkdownToHtml($data);

    echo $this->twig->render("livres/livres.html.twig", [
      "data" => $data,
    ]);
  }

  public function index(): void
  {
    isset($_GET["page"]) ? $currentPage = $_GET["page"] : $currentPage = 1;

    $data = $this->getAllLivres(intval($currentPage));
    $data = $this->transformMarkdownToHtml($data);

    $totalPages = $this->pagination($this->getCount());

    echo $this->twig->render("livres/index.html.twig", [
      "data" => $data,
      "page" => $totalPages,
    ]);
  }
}
