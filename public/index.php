<?php

require_once '../config/Database.php';

require_once '../app/controllers/UsuarioController.php';

$acao = $_GET['acao'] ?? '';

switch($acao)
{
    case 'login':

        $controller = new UsuarioController();

        $controller->login();

        break;

    default:

        require '../app/views/login.php';

        break;
}