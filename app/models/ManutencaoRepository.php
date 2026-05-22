<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Manutencao.php';

class ManutencaoRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    // CREATE
    public function createManutencao(Manutencao $manutencao)
    {
        $stmt = $this->conn->prepare(
            "
                INSERT INTO manutencoes
                (
                    descricao_servico,
                    observacoes,
                    tempo_execucao_segundos,
                    id_ordem,
                    id_usuario
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )
            "
        );

        $stmt->execute([
            $manutencao->getDescricaoServico(),
            $manutencao->getObservacoes(),
            $manutencao->getTempoExecucao(),
            $manutencao->getIdOrdem(),
            $manutencao->getIdUsuario()
        ]);
    }

    // READ ALL
    public function listarManutencao()
    {
        $stmt = $this->conn->query(
            "
                SELECT *
                FROM manutencoes
            "
        );

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $manutencoes = [];

        foreach($dados as $linha)
        {
            $manutencao = new Manutencao(
                $linha['descricao_servico'],
                $linha['observacoes'],
                $linha['tempo_execucao_segundos'],
                $linha['id_ordem'],
                $linha['id_usuario']
            );

            $manutencao->setId($linha['id_manutencao']);

            $manutencoes[] = $manutencao;
        }

        return $manutencoes;
    }

    // READ ONE
    public function buscarPorId($id)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM manutencoes
                WHERE id_manutencao = ?
            "
        );

        $stmt->execute([$id]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $manutencao = new Manutencao(
            $dados['descricao_servico'],
            $dados['observacoes'],
            $dados['tempo_execucao_segundos'],
            $dados['id_ordem'],
            $dados['id_usuario']
        );

        $manutencao->setId($dados['id_manutencao']);

        return $manutencao;
    }

    // UPDATE
    public function atualizar(Manutencao $manutencao)
    {
        $stmt = $this->conn->prepare(
            "
                UPDATE manutencoes
                SET
                    descricao_servico = ?,
                    observacoes = ?,
                    tempo_execucao_segundos = ?,
                    id_ordem = ?,
                    id_usuario = ?
                WHERE id_manutencao = ?
            "
        );

        $stmt->execute([
            $manutencao->getDescricaoServico(),
            $manutencao->getObservacoes(),
            $manutencao->getTempoExecucao(),
            $manutencao->getIdOrdem(),
            $manutencao->getIdUsuario(),
            $manutencao->getId()
        ]);
    }

    

    // DELETE
    public function excluir($id)
    {
        $stmt = $this->conn->prepare(
            "
                DELETE FROM manutencoes
                WHERE id_manutencao = ?
            "
        );

        $stmt->execute([$id]);
    }
}
?>