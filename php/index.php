<?php
  
  require_once 'vendor/autoload.php';
  require_once './backend/Router/router.php';
  require_once './backend/Controllers/Controller.php';
  require_once './backend/Database/config.php';


  $router = new Router();
  $router->add('GET', '/', 'Controller', 'index');
  $router->add('GET', '/porcinos', 'Controller', 'getPorcinosPage');
  $router->add('GET', '/cliente', 'Controller', 'getClientPage');
  $router->add('GET', '/porcinos/info', 'Controller', 'getPorcinosInfo');
  $router->add('GET', '/addPorcinos', 'Controller', 'addPorcinosPage');
  $router->add('POST', '/porcinos', 'Controller', 'setPorcinosInfo');
  

  $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);