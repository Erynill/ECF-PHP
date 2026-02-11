<?php
declare (strict_types = 1);

$router = new AltoRouter();

$router->map("GET", "/", "App\\controllers\\HomeController#index");
$router->map("GET", "/livres", "App\\controllers\\LivresController#index");
$router->map("GET", "/livres/[i:id]", function ($id) {
  $obj = new App\controllers\LivresController;
  call_user_func([$obj, "livres"], $id);
});
$router->map("GET|POST", "/livres/modify/[i:id]", function ($id) {
  $obj = new App\controllers\LivresController;
  call_user_func([$obj, "modify"], $id);
});
$router->map("GET|POST", "/livres/add", "App\\controllers\\LivresController#add");
$router->map("GET", "/livres/delete", "App\\controllers\\LivresController#delete");
$router->map("GET", "/auteurs", "App\\controllers\\AuteursController#index");
$router->map("GET", "/auteurs/[i:id]", function ($id) {
  $obj = new App\controllers\AuteursController;
  call_user_func([$obj, "auteurs"], $id);
});
$router->map("GET|POST", "/auteurs/modify/[i:id]", function ($id) {
  $obj = new App\controllers\AuteursController;
  call_user_func([$obj, "modify"], $id);
});
$router->map("GET|POST", "/auteurs/add", "App\\controllers\\AuteursController#add");
$router->map("GET", "/auteurs/delete", "App\\controllers\\AuteursController#delete");
$router->map("GET|POST", "/login", "App\\controllers\\LoginController#index");
$router->map("GET", "/logout", "App\\controllers\\LoginController#logout");

$match = $router->match();

if (is_array($match)) {
  if (is_callable($match["target"])) {
    call_user_func_array($match["target"], $match["params"]);
  } else {
    list($controller, $action) = explode("#", $match["target"]);
    $obj = new $controller;
    call_user_func([$obj, $action], $match["params"]);
  }
} else {
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
