<?php

require_once "../app/helpers/Auth.php";

class MaquinaController
{
    public function index()
    {
        Auth::admin();

        require_once "../app/views/administrador/maquinas/index.php";
    }
}