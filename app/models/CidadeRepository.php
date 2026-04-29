<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Cidade.php';

class CidadeRepository
{
    private $conn;

    public function __construct()
    {
        //Consegue conexão via Singleton
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function salvar(Cidade $cidade)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO cidades (nome, estado) VALUES (?, ?)"
        );

        $stmt->execute([
            $cidade->getNome(),
            $cidade->getEstado()
        ]);
    }

    public function listar()
    {
        $stmt = $this->conn->query("SELECT * FROM cidades WHERE delete_at IS NULL");
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cidades = [];

        foreach ($dados as $linha) {
            $cidade = new Cidade(   //Cria um objeto Cidade e passa os dados do banco pro computador
                $linha['nome'],
                $linha['estado']
            );
            $cidade->setId($linha['id']);
            $cidades[] = $cidade;       //Adiciona o objeto que foi criado em um array $cidades; No final, teremos uma lista de objetos Cidade
        }
        return $cidades;
    }

    public function buscarPorId($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM cidades WHERE id = ?");
        $stmt->execute([$id]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }
        $cidade = new Cidade($dados['nome'], $dados['estado']);
        $cidade->setId($dados['id']);
        return $cidade;
    }

    public function atualizar(Cidade $cidade)
    {
        $stmt = $this->conn->prepare(
            "UPDATE cidades SET nome = ?, estado = ? WHERE id = ?"
        );

        $stmt->execute([
            $cidade->getNome(),
            $cidade->getEstado(),
            $cidade->getId()
        ]);
    }

    public function excluir($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE cidades SET delete_at = NOW() WHERE id = ?"
        );
        $stmt->execute([$id]);
    }
}
?>