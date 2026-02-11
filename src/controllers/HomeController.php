<?php
declare (strict_types = 1);

namespace App\controllers;

class HomeController extends BaseController
{
  public function index()
  {
    if (isset($_SESSION["user"])) {
      $this->setLogin(true);
    }

    echo $this->twig->render("home/index.html.twig", [
      "login" => $this->getLogin(),
    ]);
  }
}
