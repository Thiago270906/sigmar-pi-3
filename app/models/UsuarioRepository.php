<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Cidade.php';

class CidadeRepository
{
    private $conn;

    public function __construct()
    {
        //Consegue conexão via Singleton
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }
}