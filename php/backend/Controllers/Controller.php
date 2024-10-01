<?php

  class Controller {

    public function index() {
      include_once 'frontend/views/home.php';
    }

    public function getPorcinosPage() {
      include_once 'frontend/views/porcinos.php';
    }

    public function getClientPage() {
      include_once 'frontend/views/clientes.php';
    }

    public function addClientPage() {
      include_once 'frontend/views/insertCliente.php';
    }

    public function addPorcinosPage() {
      include_once 'frontend/views/insertPorcinos.php';
    }

    public function erPorcinosPage() {
      include_once 'frontend/views/ercliente.php';
    }

    public function erClientPage() {
      include_once 'frontend/views/erporcinos.php';
    }

    public function getPorcinosInfo() {
      $client = Mongo::connect();
      $result = Mongo::getCollection($client,'porcinos');
      $data = [];
      foreach ($result as $entry) {
        $data[] = $entry;
      }
      return $data;
    }

    public function getClientInfo() {
      $client = Mongo::connect();
      $result = Mongo::getCollection($client,'clientes');
      $data = [];
      foreach ($result as $entry) {
        $data[] = $entry;
      }
      return $data;
    }

    public function setPorcinosInfo() {
      $client = Mongo::connect();
      $collection = $client->porcinos->porcinos;
      echo json_encode($_POST);
      $data = [
        'identificacion' => $_POST['identificacion'],
        'Raza' => $_POST['Raza'],
        'Edad' => $_POST['edad'],
        'Peso' => $_POST['peso'],
        'Alimentacion' => $_POST['Alimentacion'],
        'Cliente' => $_POST['client']
      ];

      $collection->insertOne($data);

      //header('Location: /porcinos');
    }
    public function setclienteInfo() {
      $client = Mongo::connect();
      $collection = $client->porcinos->client;
      echo json_encode($_POST);
      $data = [
        'identificacion' => $_POST['identificacion'],
        'Nombre' => $_POST['Nombre'],
        'Edad' => $_POST['edad']
      ];

      $collection->insertOne($data);

      //header('Location: /porcinos');
    }

  }