<?php
declare (strict_types = 1);

namespace App\controllers;

use App\models\entities\Users;

class LoginController extends BaseController
{
  public function logout(): void
  {
    session_unset();
    header("Location: /");
    exit();
  }

  public function index(): void
  {
    if (isset($_POST["username"])) {
      $user = new Users();
      $user->setUsername($_POST["username"])
        ->setPassword($_POST["password"]);
      $verify = $user->checkAuth();
      if ($verify) {
        $_SESSION["user"] = $verify->getId();
        $_SESSION["role"] = $verify->getRole();
        header("Location: /livres");
        exit();
      } else {
        echo "Login et mot de passe erronés";
      }
    }

    echo $this->twig->render("login/index.html.twig");
  }
}
