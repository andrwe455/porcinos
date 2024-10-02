<?php

require_once 'vendor/autoload.php'; // Incluir autoload de Composer
require_once 'schema.php';          // Incluir tu esquema

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Error\DebugFlag;

// Configurar el entorno
$debug = DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE;

// Procesar las solicitudes GraphQL
try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;

    $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);
    $output = $result->toArray($debug);
} catch (\Exception $e) {
    $output = [
        'errors' => [
            [
                'message' => $e->getMessage(),
            ]
        ]
    ];
}

header('Content-Type: application/json');
echo json_encode($output);
