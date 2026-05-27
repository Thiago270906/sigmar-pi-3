<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Maquina.php';
require_once __DIR__ . '/../models/SensorRepository.php';

class MaquinaRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    // CREATE
    public function createMaquina(Maquina $maquina)
    {
        $stmt = $this->conn->prepare(
            "
                INSERT INTO maquinas
                (
                    nome,
                    tipo,
                    status
                )
                VALUES
                (
                    ?,
                    ?,
                    ?
                )
            "
        );

        $stmt->execute([
            $maquina->getNome(),
            $maquina->getTipo(),
            $maquina->getStatus(),
        ]);
        
        return $this->conn->lastInsertId();
    }

    // READ ALL
    public function listarMaquinas()
    {
        $stmt = $this->conn->query(
            "
                SELECT *
                FROM maquinas
                WHERE deleted_at IS NULL
            "
        );

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $maquinas = [];

        $sensorRepository = new SensorRepository();

        foreach($dados as $linha)
        {
            $maquina = new Maquina(
                $linha['nome'],
                $linha['tipo'],
                $linha['status']
            );

            $maquina->setId($linha['id_maquina']);

            // =========================
            // BUSCA SENSORES DA MÁQUINA
            // =========================

            $sensores = $sensorRepository->listarSensoresMaquina(
                $linha['id_maquina']
            );

            foreach($sensores as $sensor)
            {
                if($sensor->getTipo() == 'temperatura')
                {
                    $maquina->setSensorTemperatura($sensor);
                }

                if($sensor->getTipo() == 'vibracao')
                {
                    $maquina->setSensorVibracao($sensor);
                }
            }

            $maquinas[] = $maquina;
        }

        return $maquinas;
    }

    // READ ONE
    public function buscarIdMaquina($id)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM maquinas
                WHERE id_maquina = ?
                AND deleted_at IS NULL
            "
        );

        $stmt->execute([$id]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $maquina = new Maquina(
            $dados['nome'],
            $dados['tipo'],
            $dados['status']
        );

        $maquina->setId($dados['id_maquina']);

        // =========================
        // BUSCA SENSORES
        // =========================

        $sensorRepository = new SensorRepository();

        $sensores = $sensorRepository->listarSensoresMaquina(
            $dados['id_maquina']
        );

        foreach($sensores as $sensor)
        {
            if($sensor->getTipo() == 'temperatura')
            {
                $maquina->setSensorTemperatura($sensor);
            }

            if($sensor->getTipo() == 'vibracao')
            {
                $maquina->setSensorVibracao($sensor);
            }
        }

        return $maquina;
    }

    // UPDATE
    public function upadateMaquina(Maquina $maquina)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE maquinas
                SET
                    nome = ?,
                    tipo = ?,
                    status = ?,
                WHERE id_maquina = ?
            "
        );

        $stmt->execute([
            $maquina->getNome(),
            $maquina->getTipo(),
            $maquina->getStatus(),
            $maquina->getId()
        ]);
    }

    // DELETE LÓGICO
    public function excluirMaquina($id)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE maquinas
                SET deleted_at = NOW()
                WHERE id_maquina = ?
            "
        );

        $stmt->execute([$id]);
    }
}
?>