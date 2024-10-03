<?php

require_once 'vendor/autoload.php';
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

class GraphQLSchemaBuilder {

    private $schema;

    public function __construct() {
        $this->schema = $this->buildSchema();
    }

    public function getSchema() {
        return $this->schema;
    }

    private function buildSchema() {
        // Definir el tipo Cliente
        $clienteType = new ObjectType([
            'name' => 'Cliente',
            'fields' => [
                '_id' => Type::id(),
                'identificacion' => Type::string(),
                'Nombre' => Type::string(),
                'Edad' => Type::int(),
            ],
        ]);

        // Definir el tipo Porcino
        $porcinoType = new ObjectType([
            'name' => 'Porcino',
            'fields' => [
                '_id' => Type::id(),
                'identificacion' => Type::string(),
                'Raza' => Type::string(),
                'Edad' => Type::int(),
                'Peso' => Type::float(),
                'Alimentacion' => Type::string(),
                'Cliente' => $clienteType, // Relación con cliente
            ],
        ]);

        // Definir el QueryType (lectura de datos)
        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'clientes' => [
                    'type' => Type::listOf($clienteType),
                    'resolve' => function() {
                        $controller = new Controller();
                        return $controller->getClientInfo();
                    }
                ],
                'porcinos' => [
                    'type' => Type::listOf($porcinoType),
                    'resolve' => function() {
                        $controller = new Controller();
                        return $controller->getPorcinosInfo();
                    }
                ],
            ],
        ]);

        // Definir el MutationType (modificación de datos)
        $mutationType = new ObjectType([
            'name' => 'Mutation',
            'fields' => [
                'addCliente' => [
                    'type' => $clienteType,
                    'args' => [
                        'identificacion' => Type::nonNull(Type::string()),
                        'Nombre' => Type::nonNull(Type::string()),
                        'Edad' => Type::nonNull(Type::int()),
                    ],
                    'resolve' => function($root, $args) {
                        $controller = new Controller();
                        $data = [
                            'identificacion' => $args['identificacion'],
                            'Nombre' => $args['Nombre'],
                            'Edad' => $args['Edad']
                        ];
                        return $controller->setClienteInfo($data);
                    }
                ],
                'addPorcino' => [
                    'type' => $porcinoType,
                    'args' => [
                        'identificacion' => Type::nonNull(Type::string()),
                        'Raza' => Type::nonNull(Type::string()),
                        'Edad' => Type::nonNull(Type::int()),
                        'Peso' => Type::nonNull(Type::float()),
                        'Alimentacion' => Type::string(),
                        'Cliente' => Type::string(),  // El cliente asociado
                    ],
                    'resolve' => function($root, $args) {
                        $controller = new Controller();
                        $data = [
                            'identificacion' => $args['identificacion'],
                            'Raza' => $args['Raza'],
                            'Edad' => $args['Edad'],
                            'Peso' => $args['Peso'],
                            'Alimentacion' => $args['Alimentacion'],
                            'Cliente' => $args['Cliente'],
                        ];
                        return $controller->setPorcinosInfo($data);
                    }
                ],
                'updateCliente' => [
                    'type' => $clienteType,
                    'args' => [
                        '_id' => Type::nonNull(Type::id()),
                        'Nombre' => Type::nonNull(Type::string()),
                        'Edad' => Type::nonNull(Type::int()),
                        'identificacion' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function($root, $args) {
                        $controller = new Controller();
                        return $controller->updateClient($args['id'], $args['Nombre'], $args['Edad'], $args['identificacion']);
                    }
                ],
                'updatePorcino' => [
                    'type' => $porcinoType,
                    'args' => [
                        '_id' => Type::nonNull(Type::id()),
                        'identificacion' => Type::nonNull(Type::string()),
                        'Raza' => Type::nonNull(Type::string()),
                        'Edad' => Type::nonNull(Type::int()),
                        'Peso' => Type::nonNull(Type::float()),
                        'Alimentacion' => Type::string(),
                        'Cliente' => Type::string(),
                    ],
                    'resolve' => function($root, $args) {
                        $controller = new Controller();
                        return $controller->updatePorcino($args['id'], $args['identificacion'], $args['Raza'], $args['Edad'], $args['Peso'], $args['Alimentacion'], $args['Cliente']);
                    }
                ],
            ],
        ]);

        // Crear el esquema
        return new Schema([
            'query' => $queryType,
            'mutation' => $mutationType,
        ]);
    }
}
