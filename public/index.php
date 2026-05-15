<?php

session_start();

require_once '../config/Database.php';

require_once '../app/helpers/Auth.php';

require_once '../app/controllers/UsuarioController.php';

$acao = $_GET['acao'] ?? '';

switch($acao)
{
    case 'login':

        $controller = new UsuarioController();

        $controller->login();

        break;

    case 'dashboard':

        Auth::admin();

        require '../app/views/administrador/dashboard/index.php';

        break;

    default:

        if(isset($_SESSION['usuario']))
        {
            header("Location: index.php?acao=dashboard");

            exit;
        }

        require '../app/views/login.php';

        break;
}