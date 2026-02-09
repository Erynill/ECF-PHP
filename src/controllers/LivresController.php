<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\repositories\LivresRepository;
use Michelf\MarkdownExtra;

class LivresController extends BaseController
{
  public function getLivres(int $page): array
  {
    $livresRepo = new LivresRepository();

    return $livresRepo->getOfLivreViewByPage($page);
  }

  public function processData(array $data): array
  {
    foreach ($data as $value) {
      $value[0]->setSynopsis(MarkdownExtra::defaultTransform($value[0]->getSynopsis()));
    }

    return $data;
  }

  public function index(): void
  {
    $data = $this->getLivres(1);
    $data = $this->processData($data);
    echo $this->twig->render("livres/index.html.twig", [
      "data" => $data,
    ]);
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
  }
}
