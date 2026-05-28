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

    $status = $_GET['status'] ?? null;

    if($status)
    {
        $maquinas = $this->repository->filtrarStatus($status);
    }
    else
    {
        $maquinas = $this->repository->listarMaquinas();
    }

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

                $limiteAlerta  = $sensorTemp['limite_alerta'] !== '' 
                    ? (float) $sensorTemp['limite_alerta'] 
                    : null;

                $limiteCritico = $sensorTemp['limite_critico'] !== '' 
                    ? (float) $sensorTemp['limite_critico'] 
                    : null;

                $sensor = new Sensor(
                    $sensorTemp['modelo'],
                    $sensorTemp['tipo'],
                    $limiteAlerta,
                    $limiteCritico,
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

    public function formSimularMaquina()
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

        require_once __DIR__ .
        "/../views/administrador/maquinas/simular.php";
    }

    public function formEditarMaquina()
    {
        Auth::admin();

        if (!isset($_GET['id'])) {
            $_SESSION['erro'] = "ID da máquina não informado.";
            header("Location: index.php?acao=maquinas");
            exit;
        }

        $id = (int) $_GET['id'];

        $maquina = $this->repository->buscarIdMaquina($id);

        if (!$maquina) {
            $_SESSION['erro'] = "Máquina não encontrada.";
            header("Location: index.php?acao=maquinas");
            exit;
        }

        // Carrega apenas sensores ATIVOS
        $sensoresExistentes = $this->sensorRepository->listarSensoresMaquina($id);

        require_once __DIR__ . "/../views/administrador/maquinas/editar.php";
    }

    // ======================
    // PROCESSAR EDIÇÃO DA MÁQUINA + SENSORES
    // ======================
    public function editarMaquina()
    {
        Auth::admin();

        try {
            $id = (int) $_POST['id_maquina'];
            $nome = trim($_POST['nome']);
            $tipo = trim($_POST['tipo']);

            if (empty($nome) || empty($tipo)) {
                throw new Exception("Nome e tipo são obrigatórios.");
            }

            // Busca máquina atual para manter status
            $maquinaAtual = $this->repository->buscarIdMaquina($id);
            if (!$maquinaAtual) {
                throw new Exception("Máquina não encontrada.");
            }

            $maquina = new Maquina($nome, $tipo, $maquinaAtual->getStatus());
            $maquina->setId($id);

            // Atualiza dados básicos da máquina
            $this->repository->updateMaquina($maquina);

            // ====================== PROCESSA TROCAS DE SENSORES ======================
            if (isset($_SESSION['sensores_troca']) && is_array($_SESSION['sensores_troca'])) {
                
                foreach ($_SESSION['sensores_troca'] as $troca) {
                    $antigoId = (int) $troca['antigo_id'];
                    $novo = $troca['novo'];

                    // 1. Desativa o sensor antigo
                    $this->sensorRepository->desativarSensorParaTroca($antigoId);

                    // 2. Cadastra o novo sensor
                    $limiteAlerta  = $novo['limite_alerta'] !== '' ? (float)$novo['limite_alerta'] : null;
                    $limiteCritico = $novo['limite_critico'] !== '' ? (float)$novo['limite_critico'] : null;

                    $sensorNovo = new Sensor(
                        $novo['modelo'],
                        $novo['tipo'],
                        $limiteAlerta,
                        $limiteCritico,
                        $id
                    );

                    $this->sensorRepository->createSensor($sensorNovo);
                    $this->sensorRepository->createMongoSensores($sensorNovo);
                }

                unset($_SESSION['sensores_troca']);
            }

            // ====================== PROCESSA SENSORES NOVOS (Cadastro normal) ======================
            if (isset($_SESSION['sensores']) && is_array($_SESSION['sensores'])) {
                foreach ($_SESSION['sensores'] as $sensorTemp) {
                    $limiteAlerta  = $sensorTemp['limite_alerta'] !== '' ? (float)$sensorTemp['limite_alerta'] : null;
                    $limiteCritico = $sensorTemp['limite_critico'] !== '' ? (float)$sensorTemp['limite_critico'] : null;

                    $sensor = new Sensor(
                        $sensorTemp['modelo'],
                        $sensorTemp['tipo'],
                        $limiteAlerta,
                        $limiteCritico,
                        $id
                    );

                    $this->sensorRepository->createSensor($sensor);
                    $this->sensorRepository->createMongoSensores($sensor);
                }

                unset($_SESSION['sensores']);
            }

            $_SESSION['sucesso'] = "Máquina e sensores atualizados com sucesso.";
            header("Location: index.php?acao=maquinas");
            exit;

        } catch (Exception $e) {
            $_SESSION['erro'] = $e->getMessage();
            header("Location: index.php?acao=form-editar-maquina&id=" . $_POST['id_maquina']);
            exit;
        }
    }
}