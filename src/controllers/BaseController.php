<?php
declare (strict_types = 1);

namespace App\controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class BaseController
{
  protected FilesystemLoader $loader;
  protected Environment $twig;

  public function __construct()
  {
    $this->loader = new FilesystemLoader(dirname(__DIR__, 2) . "/templates", );
    $this->twig = new Environment($this->loader, [
      "cache" => false,
    ]);
  }
}
