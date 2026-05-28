<?php

require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../models/Sensor.php";
require_once __DIR__ . "/../models/SensorRepository.php";

class SensorController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SensorRepository();
    }

    public function formCadastrarSensor()
    {
        Auth::admin();

        // Define as variáveis ANTES de carregar a view
        $isEdicao = isset($_GET['is_edicao']) && $_GET['is_edicao'] == 1;
        $idMaquina = $isEdicao ? (int) ($_GET['id_maquina'] ?? 0) : null;

        // Passa as variáveis para a view (melhor prática)
        require_once __DIR__ . "/../views/administrador/sensores/cadastro.php";
    }

    public function trocarSensor()
    {
        Auth::admin();

        if (!isset($_GET['id_sensor']) || !isset($_GET['id_maquina'])) {
            $_SESSION['erro'] = "Dados insuficientes para troca.";
            header("Location: index.php?acao=maquinas");
            exit;
        }

        $idSensorAntigo = (int) $_GET['id_sensor'];
        $idMaquina = (int) $_GET['id_maquina'];

        // Apenas salva a intenção na sessão
        $_SESSION['sensor_troca_pendente'] = [
            'antigo_id' => $idSensorAntigo,
            'id_maquina' => $idMaquina
        ];

        $_SESSION['sucesso'] = "Sensor selecionado para troca. Agora cadastre o novo sensor.";

        header("Location: index.php?acao=form-sensor&is_edicao=1&id_maquina=" . $idMaquina);
        exit;
    }

    public function adicionarSensorSessao()
    {
        Auth::admin();

        try {
            $modelo = trim($_POST['modelo'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');
            $limiteAlerta = $_POST['limite_alerta'] ?? '';
            $limiteCritico = $_POST['limite_critico'] ?? '';

            if (empty($modelo) || empty($tipo)) {
                throw new Exception("Modelo e tipo são obrigatórios.");
            }

            $novoSensor = [
                'modelo' => $modelo,
                'tipo' => $tipo,
                'limite_alerta' => $limiteAlerta,
                'limite_critico' => $limiteCritico
            ];

            // Se existe troca pendente
            if (isset($_SESSION['sensor_troca_pendente'])) {
                $_SESSION['sensores_troca'][] = [
                    'antigo_id' => $_SESSION['sensor_troca_pendente']['antigo_id'],
                    'novo'      => $novoSensor
                ];

                unset($_SESSION['sensor_troca_pendente']); // limpa pendência
            } else {
                // Cadastro normal (sem troca)
                $_SESSION['sensores'][] = $novoSensor;
            }

            $_SESSION['sucesso'] = "Sensor preparado para salvamento.";

            $redirect = isset($_POST['is_edicao']) && $_POST['is_edicao'] == 1 
                ? "form-editar-maquina&id=" . $_POST['id_maquina'] 
                : "form-maquina";

            header("Location: index.php?acao=" . $redirect);
            exit;

        } catch (Exception $e) {
            $_SESSION['erro'] = $e->getMessage();

            $redirect = isset($_POST['is_edicao']) && $_POST['is_edicao'] == 1 
                ? "form-editar-maquina&id=" . ($_POST['id_maquina'] ?? '') 
                : "form-maquina";

            header("Location: index.php?acao=" . $redirect);
            exit;
        }
    }

    public function removerSensorSessao()
    {
        Auth::admin();

        $index = (int) $_GET['index'];

        if (isset($_SESSION['sensores'][$index])) {
            unset($_SESSION['sensores'][$index]);
            $_SESSION['sensores'] = array_values($_SESSION['sensores']);
        }

        // Verifica origem (edição ou cadastro)
        $redirect = isset($_GET['is_edicao']) && $_GET['is_edicao'] == 1 
            ? "editar-maquina&id=" . $_GET['id_maquina'] 
            : "form-maquina";

        header("Location: index.php?acao=" . $redirect);
        exit;
    }

    // =========================
    // DESATIVAR SENSOR
    // =========================

    public function desativarSensor()
    {
        Auth::admin();

        try
        {
            $id = $_GET['id'];

            $this->repository->desativarSensorParaTroca($id);

            $_SESSION['sucesso'] = "Sensor desativado com sucesso.";

            header("Location: index.php?acao=sensores");

            exit;
        }
        catch(Exception $e)
        {
            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=sensores");

            exit;
        }
    }

    public function simularLeituras()
    {
        Auth::admin();

        try
        {
            if(!isset($_POST['sensores']))
            {
                $_SESSION['erro'] =
                    "Nenhum sensor enviado.";

                header("Location: index.php?acao=maquinas");

                exit;
            }

            foreach($_POST['sensores'] as $dadosSensor)
            {
                $idSensor = (int) $dadosSensor['id'];

                $valor = (float) $dadosSensor['valor'];

                if($dadosSensor['valor'] === '')
                {
                    continue;
                }

                $sensor = $this->repository
                    ->buscarIdSensor($idSensor);

                if(!$sensor)
                {
                    continue;
                }

                $this->repository->inserirLeitura(
                    $sensor,
                    $valor
                );
            }

            $_SESSION['sucesso'] =
                "Leituras simuladas com sucesso.";

            header("Location: index.php?acao=maquinas");

            exit;
        }
        catch(Exception $e)
        {
            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=maquinas");

            exit;
        }
    }
}

?>