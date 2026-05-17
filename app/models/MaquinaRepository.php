<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Maquina.php';

class MaquinaRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    public function createMaquina(Maquina $maquina)
    {
        $sql = "
            INSERT INTO maquinas
            (
                nome,
                tipo,
                status,
                descricao
            )
            VALUES
            (
                ?,
                ?,
                ?,
                ?
            )
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $maquina->getNome(),
            $maquina->getTipo(),
            $maquina->getStatus(),
            $maquina->getDescricao()
        ]);

        return $this->conn->lastInsertId();
    }

    // READ ALL
    public function listarMaquinas()
    {
        $sql = "SELECT * FROM maquinas";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function findById(int $id)
    {
        $sql = "SELECT * FROM maquinas WHERE id_maquina = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateMaquinas(Maquina $maquina)
    {
        $sql = "
            UPDATE maquinas
            SET
                nome = ?,
                tipo = ?,
                status = ?,
                descricao = ?
            WHERE id_maquina = ?
        ";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $maquina->getNome(),
            $maquina->getTipo(),
            $maquina->getStatus(),
            $maquina->getDescricao(),
            $maquina->getId()
        ]);
    }

    // DELETE
    public function deleteMaquinas(int $id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE cidades SET delete_at = NOW() WHERE id = ?"
        );
        $stmt->execute([$id]);
    }
}