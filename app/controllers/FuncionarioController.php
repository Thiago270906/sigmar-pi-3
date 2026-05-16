<?php

require_once "../app/helpers/Auth.php";

class FuncionarioController
{
    public function index()
    {
        Auth::admin();

        require_once "../app/views/administrador/funcionarios/index.php";
    }
}