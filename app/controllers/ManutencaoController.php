<?php

require_once __DIR__ . "/../helpers/Auth.php";

class ManutencaoController
{
    public function index()
    {
        Auth::admin();

        require_once __DIR__ . "/../views/administrador/manutencoes/index.php";
    }
}