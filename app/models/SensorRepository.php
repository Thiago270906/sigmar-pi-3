<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../../config/MongoConnection.php';
require_once __DIR__ . '/../models/Sensor.php';

class SensorRepository
{
    private $conn;

    private $mongoCollection;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();

        $this->mongoCollection = MongoConnection::getCollection(
            'leituras_sensores'
        );
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

        $sensor->setId(
            $this->conn->lastInsertId()
        );
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
        $leitura = $this->buscarUltimaLeitura($sensor->getId());

        if ($leitura) {

            $leitura = (array) $leitura;

            $sensor->setValorAtual($leitura['valor']);
            $sensor->setUnidade($leitura['unidade']);
        }

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
                AND status = 'ativo'
            "
        );

        $stmt->execute([$idMaquina]);

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sensores = [];

        $statusMaquina = 'operando';

        $idSensorResponsavel = $dados[0]['id_sensor'] ?? null;

        $stmtMaquina = $this->conn->prepare(
            "
                SELECT status
                FROM maquinas
                WHERE id_maquina = ?
            "
        );

        $stmtMaquina->execute([$idMaquina]);

        $statusAtualMaquina = $stmtMaquina->fetchColumn();

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

            $leitura = $this->buscarUltimaLeitura($sensor->getId());

            if ($leitura)
            {
                $leitura = (array) $leitura;
                
                $sensor->setUnidade($leitura['unidade']);
                
                $sensor->setValorAtual($leitura['valor']);

                $valorAtual = $leitura['valor'];

                if($sensor->getTipo() == 'temperatura')
                {
                    // MAIOR = PIOR

                    if($valorAtual >= $sensor->getLimiteCritico())
                    {
                        $statusMaquina = 'critico';

                        $idSensorResponsavel = $sensor->getId();
                    }
                    elseif(
                        $valorAtual >= $sensor->getLimiteAlerta()
                        && $statusMaquina != 'critico'
                    )
                    {
                        $statusMaquina = 'alerta';

                        $idSensorResponsavel = $sensor->getId();
                    }
                }

                if($sensor->getTipo() == 'vibracao')
                {
                    if($valorAtual <= $sensor->getLimiteAlerta())
                    {
                        if($statusMaquina != 'critico')
                        {
                            $statusMaquina = 'alerta';

                            $idSensorResponsavel = $sensor->getId();
                        }
                    }
                }
            }

            $sensores[] = $sensor;
        }

        if($statusAtualMaquina != $statusMaquina
        && $idSensorResponsavel)
        {
            $this->salvarHistorico(
                $idMaquina,
                $idSensorResponsavel,
                $statusAtualMaquina,
                $statusMaquina
            );

            $this->atualizarStatusMaquina(
                $idMaquina,
                $statusMaquina
            );
        }

        return $sensores;
    }

    private function atualizarStatusMaquina($idMaquina, $status)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE maquinas
                SET status = ?
                WHERE id_maquina = ?
            "
        );

        $stmt->execute([
            $status,
            $idMaquina
        ]);
    }

    private function salvarHistorico(
        $idMaquina,
        $idSensor,
        $statusAnterior,
        $novoStatus
    )
    {
        $stmt = $this->conn->prepare(
            "
                INSERT INTO historico_status_maquinas
                (
                    status_anterior,
                    novo_status,
                    id_maquina,
                    id_sensor
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?
                )
            "
        );

        $stmt->execute([
            $statusAnterior,
            $novoStatus,
            $idMaquina,
            $idSensor
        ]);
    }

    // DESATIVAR SENSOR
    public function desativarSensorParaTroca($idSensor)
    {
        $stmt = $this->conn->prepare(
            "UPDATE sensores 
            SET status = 'inativo', 
                data_troca = CURRENT_TIMESTAMP 
            WHERE id_sensor = ?"
        );

        $stmt->execute([$idSensor]);
    }

    private function buscarUltimaLeitura($idSensor)
    {
        return $this->mongoCollection->findOne(
            [
                'id_sensor' => (int)$idSensor
            ],
            [
                'sort' => ['timestamp' => -1]
            ]
        );
    }

public function resetarSensoresMaquina($idMaquina)
{
    $sensores = $this->listarSensoresMaquina(
        $idMaquina
    );

    foreach($sensores as $sensor)
    {
        $this->inserirLeitura(
            $sensor,
            5
        );
    }

    // recalcula status usando novas leituras
    $this->listarSensoresMaquina($idMaquina);
}

    public function createMongoSensores(Sensor $sensor)
    {
        $unidade = '';

        $tipo = strtolower($sensor->getTipo());

        if($tipo === 'temperatura')
        {
            $unidade = '°C';
        }
        elseif($tipo === 'vibracao')
        {
            $unidade = 'V';
        }

        $this->mongoCollection->insertOne([
            'id_sensor' => $sensor->getId(),
            'valor' => 5,
            'unidade' => $unidade,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function inserirLeitura(
        Sensor $sensor,
        $valor
    )
    {
        $unidade = '';

        if($sensor->getTipo() == 'temperatura')
        {
            $unidade = '°C';
        }

        if($sensor->getTipo() == 'vibracao')
        {
            $unidade = 'V';
        }

        $this->mongoCollection->insertOne([
            'id_sensor' => $sensor->getId(),
            'valor' => $valor,
            'unidade' => $unidade,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
}

?>