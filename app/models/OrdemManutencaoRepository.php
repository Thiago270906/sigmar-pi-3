<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/OrdemManutencao.php';

class OrdemManutencaoRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    // CREATE
    public function createOrdem(OrdemManutencao $ordem)
    {
        $stmt = $this->conn->prepare(
            "
            INSERT INTO ordens_manutencao
            (
                titulo,
                descricao,
                tipo,
                prioridade,
                data_agendada,
                id_maquina,
                id_usuario
            )
            VALUES
            (
                ?,
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
            $ordem->getTitulo(),
            $ordem->getDescricao(),
            $ordem->getTipo(),
            $ordem->getPrioridade(),
            $ordem->getDataAgendada(),
            $ordem->getIdMaquina(),
            $ordem->getIdUsuario()
        ]);
    }

    // READ ALL
    public function listarOrdens()
    {
        $stmt = $this->conn->query(
            "
                SELECT 
                    om.*,
                    u.nome AS nome_tecnico,
                    m.nome AS nome_maquina
                FROM ordens_manutencao om

                INNER JOIN usuarios u
                    ON om.id_usuario = u.id_usuario

                INNER JOIN maquinas m
                    ON om.id_maquina = m.id_maquina

                WHERE om.deleted_at IS NULL
            "
        );

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $ordens = [];

        foreach($dados as $linha)
        {
            $ordem = new OrdemManutencao(
                $linha['titulo'],
                $linha['descricao'],
                $linha['tipo'],
                $linha['prioridade'],
                $linha['status'],
                $linha['data_agendada'],
                $linha['id_maquina'],
                $linha['id_usuario']
            );

            $ordem->setId($linha['id_ordem']);

            // NOVOS DADOS
            $ordem->setNomeTecnico($linha['nome_tecnico']);

            $ordem->setNomeMaquina($linha['nome_maquina']);

            $ordens[] = $ordem;
        }

        return $ordens;
    }

    public function listarOrdemTecnico($idUsuario)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM ordens_manutencao
                WHERE id_usuario = ?
                AND deleted_at IS NULL
                AND status != 'concluida'
            "
        );

        $stmt->execute([$idUsuario]);

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $ordens = [];

        foreach($dados as $linha)
        {
            $ordem = new OrdemManutencao(
                $linha['titulo'],
                $linha['descricao'],
                $linha['tipo'],
                $linha['prioridade'],
                $linha['status'],
                $linha['data_agendada'],
                $linha['id_maquina'],
                $linha['id_usuario']
            );

            $ordem->setId($linha['id_ordem']);

            $ordens[] = $ordem;
        }

        return $ordens;
    }

    // UPDATE
    public function atualizarOrdem(OrdemManutencao $ordem)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE ordens_manutencao
                SET
                    titulo = ?,
                    descricao = ?,
                    tipo = ?,
                    prioridade = ?,
                    status = ?,
                    data_agendada = ?,
                    id_maquina = ?,
                    id_usuario = ?
                WHERE id_ordem = ?
            "
        );

        $stmt->execute([
            $ordem->getTitulo(),
            $ordem->getDescricao(),
            $ordem->getTipo(),
            $ordem->getPrioridade(),
            $ordem->getStatus(),
            $ordem->getDataAgendada(),
            $ordem->getIdMaquina(),
            $ordem->getIdUsuario(),
            $ordem->getId()
        ]);
    }

    public function ordensPendentes()
    {
        $sql = "
            UPDATE ordens_manutencao
            SET status = 'pendente'
            WHERE status = 'agendada'
            AND data_agendada < CURDATE()
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
    }

    public function andamentoOrdem($id)
    {
        $sql = "
            UPDATE ordens_manutencao
            SET status = 'em_andamento'
            WHERE id_ordem = ?
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);
    }

    public function concluirOrdem($id)
    {
        $sql = "
            UPDATE ordens_manutencao
            SET
                status = 'concluida',
                data_conclusao = CURDATE()
            WHERE id_ordem = ?
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);
    }

    public function cancelarOrdem($id)
    {
        $sql = "
            UPDATE ordens_manutencao
            SET status = 'cancelada'
            WHERE id_ordem = ?
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);
    }

    // DELETE LÓGICO
    public function excluir($id)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE ordens_manutencao
                SET deleted_at = NOW()
                WHERE id_ordem = ?
            "
        );

        $stmt->execute([$id]);
    }
}
?>