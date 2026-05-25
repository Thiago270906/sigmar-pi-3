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
                    id_ordem,
                    id_usuario
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
            $manutencao->getDescricaoServico(),
            $manutencao->getObservacoes(),
            $manutencao->getIdOrdem(),
            $manutencao->getIdUsuario()
        ]);
    }

    // READ ONE
    public function buscarIdManutencao($id)
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
            $dados['id_ordem'],
            $dados['id_usuario']
        );

        $manutencao->setId($dados['id_manutencao']);

        return $manutencao;
    }
    
    public function buscarPorOrdem($idOrdem)
    {
        $stmt = $this->conn->prepare(
            "
                SELECT *
                FROM manutencoes
                WHERE id_ordem = ?
            "
        );

        $stmt->execute([$idOrdem]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $manutencao = new Manutencao(
            $dados['descricao_servico'],
            $dados['observacoes'],
            $dados['id_ordem'],
            $dados['id_usuario']
        );

        $manutencao->setId($dados['id_manutencao']);

        return $manutencao;
    }
}
?>