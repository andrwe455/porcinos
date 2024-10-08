<?php

  use MongoDB\Client;
  use MongoDB\Driver\ServerApi;
  use MondoDB\Database;

  class Mongo {
    private const uri = 'mongodb://localhost:27017/porcinos';
    private const db = 'porcinos';

    public static function connect() {
      try {
        $client = new Client(self::uri);
        return $client;
      } catch (Exception $e) {
        return null;
      }
    }

    public static function getCollection($client, $collectionName) {
      $collection = $client->porcinos->$collectionName;
      return $collection->find();
    }
  }