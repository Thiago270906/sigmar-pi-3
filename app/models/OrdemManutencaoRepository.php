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
                ORDER BY 
                CASE 
                    WHEN om.status = 'concluida' THEN om.data_conclusao 
                    ELSE om.data_agendada 
                END DESC
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

            if (isset($linha['data_inicio'])) {
                $ordem->setDataInicio($linha['data_inicio']);
            }
            if (isset($linha['data_conclusao'])) {
                $ordem->setDataConclusao($linha['data_conclusao']);
            }

            $ordens[] = $ordem;
        }

        return $ordens;
    }

    public function buscarIdOrdem($id)
    {
        $stmt = $this->conn->prepare(
            "
            SELECT 
                om.*,
                u.nome AS nome_tecnico,
                m.nome AS nome_maquina,
                m.tipo AS tipo_maquina,
                m.status AS status_maquina

                FROM ordens_manutencao om

                INNER JOIN usuarios u
                    ON om.id_usuario = u.id_usuario

                INNER JOIN maquinas m
                    ON om.id_maquina = m.id_maquina

                WHERE om.id_ordem = ?
                AND om.deleted_at IS NULL
            "
        );

        $stmt->execute([$id]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $ordem = new OrdemManutencao(
            $dados['titulo'],
            $dados['descricao'],
            $dados['tipo'],
            $dados['prioridade'],
            $dados['status'],
            $dados['data_agendada'],
            $dados['id_maquina'],
            $dados['id_usuario']
        );

        $ordem->setId($dados['id_ordem']);

        // NOVOS DADOS
        $ordem->setNomeTecnico($dados['nome_tecnico']);

        $ordem->setNomeMaquina($dados['nome_maquina']);

        $ordem->setTipoMaquina($dados['tipo_maquina']);

        $ordem->setStatusMaquina($dados['status_maquina']);

        $ordem->setDataInicio($dados['data_inicio']);

        $ordem->setDataConclusao($dados['data_conclusao']);
        return $ordem;
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
    public function updateOrdem(OrdemManutencao $ordem)
    {
        try {
            $stmt = $this->conn->prepare(
                "UPDATE ordens_manutencao SET
                    titulo = ?,
                    descricao = ?,
                    tipo = ?,
                    prioridade = ?,
                    data_agendada = ?,
                    id_maquina = ?,
                    id_usuario = ?
                WHERE id_ordem = ?"
            );

            $stmt->execute([
                $ordem->getTitulo(),
                $ordem->getDescricao(),
                $ordem->getTipo(),
                $ordem->getPrioridade(),
                $ordem->getDataAgendada(),
                $ordem->getIdMaquina(),
                $ordem->getIdUsuario(),
                $ordem->getId()   // ID obrigatório
            ]);

            return $stmt->rowCount() > 0; // Retorna true se atualizou algo

        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar ordem: " . $e->getMessage());
        }
    }

    public function ordensagendadas()
    {
        $sql = "
            UPDATE ordens_manutencao
            SET status = 'agendada'
            WHERE status = 'pendente'
            AND data_agendada > CURDATE()
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
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

    public function comecarOrdem($id)
    {
        $sql = "
            UPDATE ordens_manutencao
            SET 
                status = 'em_andamento',
                data_inicio = CURRENT_TIMESTAMP
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
                data_conclusao = CURRENT_TIMESTAMP
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