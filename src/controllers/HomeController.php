<?php
declare (strict_types = 1);

namespace App\controllers;

class HomeController extends BaseController
{
  public function index()
  {
    echo $this->twig->render("home/index.html.twig");
  }
}
