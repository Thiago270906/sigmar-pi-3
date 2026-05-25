<?php

require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../models/Maquina.php";
require_once __DIR__ . "/../models/MaquinaRepository.php";

require_once __DIR__ . "/../models/Sensor.php";
require_once __DIR__ . "/../models/SensorRepository.php";

class MaquinaController
{
    private $repository;

    private $sensorRepository;

    public function __construct()
    {
        $this->repository = new MaquinaRepository();

        $this->sensorRepository = new SensorRepository();
    }

    public function index()
    {
        Auth::admin();

        $maquinas = $this->repository->listarMaquinas();

        require_once __DIR__ . "/../views/administrador/maquinas/index.php";
    }

    public function formCadastrarMaquina()
    {
        Auth::admin();

        require_once __DIR__ . "/../views/administrador/maquinas/cadastro.php";
    }

    public function cadastrarMaquina()
    {
        Auth::admin();

        try
        {
            $nome = trim($_POST['nome']);
            $tipo = trim($_POST['tipo']);
            $status = 'operando';

            // =========================
            // CRIA OBJETO MÁQUINA
            // =========================

            $maquina = new Maquina(
                $nome,
                $tipo,
                $status
            );

            // =========================
            // SALVA MÁQUINA
            // =========================

            $idMaquina = (int) $this->repository->createMaquina($maquina);

            // =========================
            // SALVA SENSORES DA SESSÃO
            // =========================

            if(isset($_SESSION['sensores']))
            {
                foreach($_SESSION['sensores'] as $sensorTemp)
                {
                    $sensor = new Sensor(
                        $sensorTemp['modelo'],
                        $sensorTemp['tipo'],
                        $sensorTemp['limite_alerta'],
                        $sensorTemp['limite_critico'],
                        $idMaquina
                    );

                    $this->sensorRepository->createSensor($sensor);
                    $this->sensorRepository->createMongoSensores($sensor);
                }

                unset($_SESSION['sensores']);
            }

            $_SESSION['sucesso'] = "Máquina cadastrada com sucesso.";

            header("Location: index.php?acao=maquinas");

            exit;
        }
        catch(Exception $e)
        {
            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-maquina");

            exit;
        }
    }
    
    public function detalhesMaquina()
    {
        Auth::admin();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Máquina não encontrada.";

            header("Location: index.php?acao=maquinas");

            exit;
        }

        $id = (int) $_GET['id'];

        $maquina = $this->repository->buscarIdMaquina($id);

        if(!$maquina)
        {
            $_SESSION['erro'] = "Máquina não encontrada.";

            header("Location: index.php?acao=maquinas");

            exit;
        }

        require_once __DIR__ . "/../views/administrador/maquinas/detalhes.php";
    }
}