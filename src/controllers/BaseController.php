<?php
declare (strict_types = 1);

namespace App\controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class BaseController
{
  protected FilesystemLoader $loader;
  protected Environment $twig;
  protected bool $login = false;

  public function __construct()
  {
    $this->loader = new FilesystemLoader(dirname(__DIR__, 2) . "/templates", );
    $this->twig = new Environment($this->loader, [
      "cache" => false,
    ]);
  }

  /**
   * Get the value of login
   */
  public function getLogin(): bool
  {
    return $this->login;
  }

  /**
   * Set the value of login
   *
   * @return  self
   */
  public function setLogin(bool $login): self
  {
    $this->login = $login;

    return $this;
  }

  public function checkSession(): void
  {
    if (!isset($_SESSION["user"])) {
      header("Location: /login");
      exit();
    } else {
      $this->setLogin(true);
    }
  }

  public function checkRole(): void
  {
    if ($_SESSION["role"] !== "admin") {
      header("Location: /");
      exit();
    }
  }
}
