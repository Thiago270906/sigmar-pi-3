<?php

require_once __DIR__ . "/../helpers/Auth.php";

class FuncionarioController
{
    public function index()
    {
        Auth::admin();

        require_once __DIR__ . "/../views/administrador/funcionarios/index.php";
    }
}