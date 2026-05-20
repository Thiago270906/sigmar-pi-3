<?php

use MongoDB\Client;

class MongoConnection
{
    private static $client = null;

    public static function getConnection()
    {
        if(self::$client === null)
        {
            self::$client = new Client(
                "mongodb://localhost:27017"
            );
        }

        return self::$client;
    }

    public static function getCollection($collection)
    {
        $client = self::getConnection();

        return $client
            ->maquinas
            ->selectCollection($collection);
    }
}