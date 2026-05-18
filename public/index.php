<?php

session_start();

require_once "../vendor/autoload.php";

require_once "../config/Database.php";
require_once "../config/MongoConnection.php";

require_once '../app/helpers/Auth.php';

require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/MaquinaController.php';
require_once '../app/controllers/ManutencaoController.php';

$acao = $_GET['acao'] ?? '';

switch($acao)
{
    // =========================
    // LOGIN
    // =========================

    case 'login':

        $controller = new UsuarioController();

        $controller->login();

    break;

    case 'logout':

        $controller = new UsuarioController();

        $controller->logout();

    break;

    // =========================
    // DASHBOARD
    // =========================

    case 'dashboard':

        Auth::admin();

        require '../app/views/administrador/dashboard/index.php';

    break;

    // =========================
    // MÁQUINAS
    // =========================

    case 'maquinas':

        Auth::admin();

        $controller = new MaquinaController();

        $controller->index();

    break;

    case 'form-maquina':

        Auth::admin();

        $controller = new MaquinaController();

        $controller->formCadastrarMaquina();

    break;

    case 'cadastrar-maquina':

        Auth::admin();

        $controller = new MaquinaController();

        $controller->cadastrarMaquina();

    break;

    // =========================
    // FUNCIONÁRIOS
    // =========================

    case 'funcionarios':

        Auth::admin();

        $controller = new UsuarioController();

        $controller->index();

    break;

    case 'form-funcionario':

        Auth::admin();

        $controller = new UsuarioController();

        $controller->formCadastrarFuncionario();

    break;

    case 'cadastrar-funcionario':

        Auth::admin();

        $controller = new UsuarioController();

        $controller->cadastrarFuncionario();

    break;

    // =========================
    // MANUTENÇÕES
    // =========================

    case 'manutencoes':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->index();

    break;

    case 'form-ordem':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->formCadastrarOrdem();

    break;

    case 'cadastrar-ordem':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->cadastrarOrdem();

    break;

    case 'form-manutencao':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->formCadastrarManutencao();

    break;

    case 'cadastrar-manutencao':

        Auth::check();

        $controller = new ManutencaoController();

        $controller->cadastrarManutencao();

    break;

    // =========================
    // PADRÃO
    // =========================

    default:

        if(isset($_SESSION['usuario']))
        {
            header("Location: index.php?acao=dashboard");

            exit;
        }

        require '../app/views/login.php';

    break;
}