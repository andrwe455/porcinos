<?php

  class Controller {

    public function index() {
      include_once 'frontend/views/home.php';
    }

    public function getPorcinosPage() {
      include_once 'frontend/views/porcinos.php';
    }

    public function getClientPage() {
      include_once 'frontend/views/client.php';
    }

    public function addPorcinosPage() {
      include_once 'frontend/views/insertPorcinos.php';
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

  }