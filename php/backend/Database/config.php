<?php

  use Exception;
  use MongoDB\Client;
  use MongoDB\Driver\ServerApi;

  class Mongo {
    private const uri = 'mongodb://localhost:27017/porcinos';

    public static function connect() {
      try {
        $client = new Client(self::uri);
        echo 'Connected to the database';
        return $client;
      } catch (Exception $e) {
        return null;
      }
    }
  }