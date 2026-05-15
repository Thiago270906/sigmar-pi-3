<?php

require_once __DIR__ . '/../models/Cidade.php';
require_once __DIR__ . '/../models/CidadeRepository.php';

class CidadeController
{
    private $repository;        //Guarda o objeto que acessa o banco de dados

    public function __construct()
    {
        $this->repository =  new CidadeRepository();
    }
}