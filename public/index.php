<?php

session_start();

require_once '../config/Database.php';

require_once '../app/helpers/Auth.php';

require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/MaquinaController.php';
require_once '../app/controllers/FuncionarioController.php';
require_once '../app/controllers/ManutencaoController.php';

$acao = $_GET['acao'] ?? '';

switch($acao)
{
    // LOGIN
    case 'login':

        $controller = new UsuarioController();

        $controller->login();

    break;

    // DASHBOARD
    case 'dashboard':

        Auth::admin();

        require '../app/views/administrador/dashboard/index.php';

    break;

    case 'logout':

        $controller = new UsuarioController();

        $controller->logout();

    break;

    // MÁQUINAS
    case 'maquinas':

        Auth::admin();

        $controller = new MaquinaController();

        $controller->index();

    break;

    case 'form-maquina':

        $controller = new MaquinaController();

        $controller->formCadastrar();

    break;

    case 'cadastrar-maquina':

        $controller = new MaquinaController();

        $controller->cadastrarMaquina();

    break;

    // FUNCIONÁRIOS
    case 'funcionarios':

        Auth::admin();

        $controller = new FuncionarioController();

        $controller->index();

    break;

    // MANUTENÇÕES
    case 'manutencoes':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->index();

    break;

    // PADRÃO
    default:

        if(isset($_SESSION['usuario']))
        {
            header("Location: index.php?acao=dashboard");

            exit;
        }

        require '../app/views/login.php';

    break;
}