<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

// Definición del tipo Cliente
$clienteType = new ObjectType([
    'name' => 'Cliente',
    'fields' => [
        '_id' => Type::id(),
        'identificacion' => Type::string(),
        'Nombre' => Type::string(),
        'Edad' => Type::int(),
    ],
]);

// Definición del tipo Porcino
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
    ],
]);

// Crear el esquema
$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType,
]);

