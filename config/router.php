<?php
declare (strict_types = 1);

$router = new AltoRouter();

$router->map("GET", "/", "App\\controllers\\HomeController#index");
$router->map("GET", "/livres", "App\\controllers\\LivresController#index");
$router->map("GET", "/livres?page=[i]", "App\\controllers\\LivresController#index");
$router->map("GET", "/livres/[i:id]", function ($id) {
  $obj = new App\controllers\LivresController;
  call_user_func([$obj, "livres"], $id);
});

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
