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

        require_once __DIR__ . "/../views/administrador/sensores/cadastro.php";
    }

    public function adicionarSensorSessao()
    {
        Auth::admin();

        try {

            $modelo = trim($_POST['modelo']);
            $tipo = trim($_POST['tipo']);

            $limiteAlerta = $_POST['limite_alerta'];
            $limiteCritico = $_POST['limite_critico'];

            $_SESSION['sensores'][] = [
                'modelo' => $modelo,
                'tipo' => $tipo,
                'limite_alerta' => $limiteAlerta,
                'limite_critico' => $limiteCritico
            ];

            $_SESSION['sucesso'] = "Sensor adicionado com sucesso.";

            header("Location: index.php?acao=form-maquina");

            exit;

        } catch(Exception $e) {

            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-sensor");

            exit;
        }
    }

    public function removerSensorSessao()
    {
        Auth::admin();

        $index = $_GET['index'];

        unset($_SESSION['sensores'][$index]);

        $_SESSION['sensores'] = array_values(
            $_SESSION['sensores']
        );

        header("Location: index.php?acao=form-maquina");

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

            $this->repository->desativarSensor($id);

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

                // IGNORA CAMPOS VAZIOS
                if($valor <= 0)
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