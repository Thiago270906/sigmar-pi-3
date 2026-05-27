<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

require_once "../vendor/autoload.php";

require_once "../config/Database.php";
require_once "../config/MongoConnection.php";

require_once '../app/helpers/Auth.php';

require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/MaquinaController.php';
require_once '../app/controllers/SensorController.php';
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

        Auth::check();

        if($_SESSION['usuario']['cargo'] === 'admin') {

            $maquinaRepository = new MaquinaRepository();

            $maquinas = $maquinaRepository->listarMaquinas();

            require '../app/views/administrador/dashboard/index.php';

        } else {

            require '../app/views/tecnico/dashboard/index.php';

        }

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

    case 'detalhes-maquina':
        $controller = new MaquinaController();
        $controller->detalhesMaquina();
    break;

    case 'form-simular-maquina':
        $controller = new MaquinaController();
        $controller->formSimularMaquina();

    break;

    case 'simular-leituras':
        $controller = new SensorController();
        $controller->simularLeituras();

    break;

    case 'form-sensor':

        Auth::admin();

        $controller = new SensorController();

        $controller->formCadastrarSensor();

    break;

    case 'adicionar-sensor':

        Auth::admin();

        $controller = new SensorController();

        $controller->adicionarSensorSessao();

    break;

    case 'remover-sensor':

        Auth::admin();

        $controller = new SensorController();

        $controller->removerSensorSessao();

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

    case 'detalhes-funcionario':
        Auth::admin();

        $controller = new UsuarioController();

        $controller->detalhesFuncionario();
        
    break;
    // =========================
    // MANUTENÇÕES
    // =========================

    case 'manutencoes':

        
        if($_SESSION['usuario']['cargo'] === 'admin') {
            
            Auth::admin();
            $controller = new ManutencaoController();

                $controller->indexAdmin();

        } else {

            Auth::tecnico();
            $controller = new ManutencaoController();

                $controller->indexTecnico();
        }

    break;

    case 'form-ordem':

        Auth::admin();

        $controller = new ManutencaoController();

        $controller->formCadastrarOrdem();

    break;

    case 'cadastrar-ordem':

        Auth::admin();

        $controller = new ManutencaoController();

        $controller->cadastrarOrdem();

    break;

    case 'detalhes-ordem':

        Auth::admin();

        $controller = new ManutencaoController();

        $controller->detalhesOrdem();

    break;

    case 'form-manutencao':

        Auth::tecnico();

        $controller = new ManutencaoController();

        $controller->formCadastrarManutencao();

    break;

    case 'cadastrar-manutencao':

        Auth::tecnico();

        $controller = new ManutencaoController();

        $controller->cadastrarManutencao();

    break;

    case 'detalhes-manutencao':

        Auth::tecnico();

        $controller = new ManutencaoController();

        $controller->detalhesOrdem();

    break;

    case 'iniciar-manutencao':

        Auth::tecnico();

        $controller = new ManutencaoController();

        $controller->iniciarManutencao();
        
    break;

    case 'finalizar-manutencao':

        Auth::tecnico();

        $controller = new ManutencaoController();

        $controller->finalizarManutencao();
        
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