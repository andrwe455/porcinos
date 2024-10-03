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
    public function upPorcinosPage() {
      include_once 'frontend/views/updatePorcinos.php';
    }
    public function upClientePage() {
      include_once 'frontend/views/updateCliente.php';
    }

    public function erPorcinosPage() {
      include_once 'frontend/views/erporcinos.php';
    }

    public function erClientPage() {
      include_once 'frontend/views/ercliente.php';
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

      header('Location: /porcinos');
    }
    public function setclienteInfo() {
      $client = Mongo::connect();
      $collection = $client->porcinos->clientes;
      echo json_encode($_POST);
      $data = [
        'identificacion' => $_POST['identificacion'],
        'Nombre' => $_POST['nombre'],
        'Edad' => $_POST['edad']
      ];

      $collection->insertOne($data);

      header('Location: /cliente');
    }

    public function deletePorcino($id) {
      $client = Mongo::connect();
      $collection = $client->porcinos->porcinos;

      // Buscar y eliminar el porcino por su identificador
      $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);


      header('Location: /cliente');
    }

    public function deleteCliente($id) {
        $client = Mongo::connect();
        $collection = $client->porcinos->clientes;

        // Eliminar el cliente por su ID
        $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

        // Redirigir después de eliminar
        header("Location: /clientes?status=deleted");
    }


    public function getPorcinoById($id) {
        // Conectar a MongoDB
        $client = Mongo::connect();
        $collection = $client->porcinos->porcinos;

        // Obtener el porcino por su ID
        $porcino = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

        return $porcino;
    }

    public function updatePorcino() {
        // Conectar a MongoDB
        $client = Mongo::connect();
        $collection = $client->porcinos->porcinos;

        // Actualizar el porcino
        $result = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($_POST['id'])],
            ['$set' => [
                'nombre' => $_POST['nombre'],
                'Raza' => $_POST['raza'],
                'edad' => $_POST['edad'],
                'peso' => $_POST['peso']
            ]]
        );

        header('Location: /porcinos');
    }

    public function getClientById($id) {
        $client = Mongo::connect();
        $collection = $client->porcinos->clientes;

        // Obtener el cliente por su ID
        $client = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

        return $client;
    }

    // Actualizar cliente
    public function updateClient($id, $nombre, $edad, $identificacion) {
        $client = Mongo::connect();
        $collection = $client->porcinos->clientes;

        // Actualizar el cliente
        $result = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id ?? $_POST['id'])],
            ['$set' => [
                'Nombre' => $nombre ?? $_POST['nombre'],
                'Edad' => $edad ?? $_POST['edad'],
                'identificacion' => $identificacion ?? $_POST['identificacion']
            ]]
        );

        return $result->getModifiedCount() > 0;
    }
    public function handleUpdateRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos enviados por el formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $raza = $_POST['raza'];
            $edad = $_POST['edad'];
            $peso = $_POST['peso'];

            // Llamar a la función updatePorcino para actualizar el porcino
            $success = $this->updatePorcino($id, $nombre, $raza, $edad, $peso);

            // Redirigir según el resultado de la actualización
            if ($success) {
                header("Location: /porcinos?status=success");
            } else {
                header("Location: /porcinos?status=error");
            }
        }
    }
    public function handleClientUpdateRequest() {
      echo 'hola';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo json_encode($_POST);
            // Obtener los datos enviados por el formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $identificacion = $_POST['identificacion'];

            // Llamar a la función updateClient para actualizar el cliente
            $success = $this->updateClient($id, $nombre, $edad, $identificacion);

            // Redirigir según el resultado de la actualización
            if ($success) {
                //header("Location: /clientes?status=success");
            } else {
                //header("Location: /clientes?status=error");
            }
        }
    }

    // Resolver para obtener todos los porcinos (GraphQL Query)
    public function resolveGetPorcinos() {
        return $this->getPorcinosInfo();
    }

    // Resolver para obtener todos los clientes (GraphQL Query)
    public function resolveGetClientes() {
        return $this->getClientInfo();
    }

    // Resolver para obtener un porcino por ID (GraphQL Query)
    public function resolveGetPorcinoById($root, $args) {
        return $this->getPorcinoById($args['id']);
    }

    // Resolver para obtener un cliente por ID (GraphQL Query)
    public function resolveGetClienteById($root, $args) {
        return $this->getClientById($args['id']);
    }

    // Resolver para crear un nuevo porcino (GraphQL Mutation)
    public function resolveCreatePorcino($root, $args) {
        $data = [
            'identificacion' => $args['identificacion'],
            'Raza' => $args['Raza'],
            'Edad' => $args['Edad'],
            'Peso' => $args['Peso'],
            'Alimentacion' => $args['Alimentacion'],
            'Cliente' => $args['Cliente']
        ];
        return $this->setPorcinosInfo($data);
    }

    // Resolver para crear un nuevo cliente (GraphQL Mutation)
    public function resolveCreateCliente($root, $args) {
        $data = [
            'identificacion' => $args['identificacion'],
            'Nombre' => $args['Nombre'],
            'Edad' => $args['Edad']
        ];
        return $this->setClienteInfo($data);
    }

    // Resolver para actualizar un porcino (GraphQL Mutation)
    public function resolveUpdatePorcino($root, $args) {

      return $this->updatePorcino($args['id'], $args['nombre'], $args['raza'], $args['edad'], $args['peso']);
    }

    // Resolver para actualizar un cliente (GraphQL Mutation)
    public function resolveUpdateCliente($root, $args) {
        return $this->updateClient($args['id'], $args['nombre'], $args['edad'], $args['identificacion']);
    }

    // Resolver para eliminar un porcino (GraphQL Mutation)
    public function resolveDeletePorcino($root, $args) {
        return $this->deletePorcino($args['id']);
    }

    // Resolver para eliminar un cliente (GraphQL Mutation)
    public function resolveDeleteCliente($root, $args) {
        return $this->deleteCliente($args['id']);
    }

}