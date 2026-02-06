<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\repositories\LivresRepository;

class LivresController extends BaseController
{
  public function getLivres()
  {
    $livresRepo = new LivresRepository();

    $data = $livresRepo->getAll();
  }

  public function index()
  {
    // $data = $this->getLivres();
    echo $this->twig->render("livres/index.html.twig");
  }
}
