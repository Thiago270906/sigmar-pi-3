<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Sensor.php';

class SensorRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    // CREATE
    public function createSensor(Sensor $sensor)
    {
        $stmt = $this->conn->prepare(
            "
                INSERT INTO sensores
                (
                    modelo,
                    tipo,
                    limite_alerta,
                    limite_critico,
                    status,
                    id_maquina
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )
            "
        );

        $stmt->execute([
            $sensor->getModelo(),
            $sensor->getTipo(),
            $sensor->getLimiteAlerta(),
            $sensor->getLimiteCritico(),
            $sensor->getStatus(),
            $sensor->getIdMaquina()
        ]);
    }

    // READ ONE
    public function buscarIdSensor($id)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM sensores
                WHERE id_sensor = ?
            "
        );

        $stmt->execute([$id]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $sensor = new Sensor(
            $dados['modelo'],
            $dados['tipo'],
            $dados['limite_alerta'],
            $dados['limite_critico'],
            $dados['id_maquina']
        );

        $sensor->setId($dados['id_sensor']);
        $sensor->setStatus($dados['status']);
        $sensor->setDataInstalacao($dados['data_instalacao']);
        $sensor->setDataTroca($dados['data_troca']);

        return $sensor;
    }

    // READ ALL BY MÁQUINA
    public function listarSensoresMaquina($idMaquina)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM sensores
                WHERE id_maquina = ?
            "
        );

        $stmt->execute([$idMaquina]);

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sensores = [];

        foreach($dados as $linha)
        {
            $sensor = new Sensor(
                $linha['modelo'],
                $linha['tipo'],
                $linha['limite_alerta'],
                $linha['limite_critico'],
                $linha['id_maquina']
            );

            $sensor->setId($linha['id_sensor']);
            $sensor->setStatus($linha['status']);
            $sensor->setDataInstalacao($linha['data_instalacao']);
            $sensor->setDataTroca($linha['data_troca']);

            $sensores[] = $sensor;
        }

        return $sensores;
    }

    // DESATIVAR SENSOR
    public function desativarSensor($id)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE sensores
                SET status = 'inativo'
                WHERE id_sensor = ?
            "
        );

        $stmt->execute([$id]);
    }
}

?>