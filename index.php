<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";
session_start();
$router = new Router(URL);
$router->namespace("App\Controllers");
$router->get("/","indexController:home","h.screen");
$router->get("/result","indexController:result","r.screen");
$router->post("/calculate","indexController:calcularMoeda","c.calc");
$router->dispatch();