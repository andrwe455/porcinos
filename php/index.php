<?php
  
  require_once 'vendor/autoload.php';
  require_once './backend/Router/router.php';
  require_once './backend/Controllers/Controller.php';
  require_once './backend/Database/config.php';
  require_once './backend/graphql.php';


  $router = new Router();

  
  $router->add('GET', '/', 'Controller', 'index');
  $router->add('GET', '/porcinos', 'Controller', 'getPorcinosPage');
  $router->add('GET', '/cliente', 'Controller', 'getClientPage');
  $router->add('GET', '/porcinos/info', 'Controller', 'getPorcinosInfo');
  $router->add('GET', '/addPorcinos', 'Controller', 'addPorcinosPage');
  $router->add('GET', '/addCliente', 'Controller', 'addClientPage');
  $router->add('GET', '/ercliente', 'Controller', 'erClientPage');
  $router->add('GET', '/erporcinos', 'Controller', 'erPorcinosPage');
  $router->add('GET', '/updatePorcinos', 'Controller', 'upPorcinosPage');
  $router->add('GET', '/updateCliente', 'Controller', 'upClientePage');

  $router->add('POST', '/porcinos', 'Controller', 'setPorcinosInfo');
  $router->add('POST', '/cliente', 'Controller', 'addClienteInfo');
  $router->add('POST', '/updateCliente', 'Controller', 'updateClient');
  $router->add('POST', '/updatePorcino', 'Controller', 'updatePorcino');
  $router->add('POST', '/addCliente', 'Controller', 'setclienteInfo');
  $router->add('POST', '/addPorcinos', 'Controller', 'setPorcinosInfo');
  $router->add('POST', '/ercliente', 'Controller', 'deleteClient');
  $router->add('POST', '/erporcinos', 'Controller', 'deletePorcino');

  $router->add('POST', '/graphqlC', 'graphq', 'handleRequest');
  

  $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);