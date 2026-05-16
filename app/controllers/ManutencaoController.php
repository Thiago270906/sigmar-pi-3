<?php

require_once "../app/helpers/Auth.php";

class ManutencaoController
{
    public function index()
    {
        Auth::admin();

        require_once "../app/views/administrador/manutencoes/index.php";
    }
}