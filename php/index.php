<?php
  
  require_once 'vendor/autoload.php';
  require_once './backend/Router/router.php';
  require_once './backend/Controllers/Controller.php';
  require_once './backend/Database/config.php';


  $router = new Router();
  $router->add('GET', '/', 'Controller', 'index');

  $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);