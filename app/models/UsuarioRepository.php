<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Endereco.php';

class UsuarioRepository
{
    private $conn;

    public function __construct()
    {
        $db = Database::getInstance();

        $this->conn = $db->getConnection();
    }

    public function buscarPorEmail($email)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM usuarios WHERE email = ?"
        );

        $stmt->execute([$email]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $usuario = new Usuario(
            $dados['nome'],
            $dados['email'],
            $dados['senha_hash'],
            $dados['cargo'],
            $dados['telefone']
        );

        $usuario->setId($dados['id_usuario']);

        return $usuario;
    }

    public function createFuncionario(Usuario $usuario, Endereco $endereco)
    {
        try {

            $this->conn->beginTransaction();

            $stmtUsuario = $this->conn->prepare(
                "INSERT INTO usuarios
                (
                    nome,
                    email,
                    senha_hash,
                    cargo,
                    telefone
                )
                VALUES
                (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )"
            );

            $stmtUsuario->execute([
                $usuario->getNome(),
                $usuario->getEmail(),
                $usuario->getSenha(),
                $usuario->getCargo(),
                $usuario->getTelefone()
            ]);

            $idUsuario = $this->conn->lastInsertId();

            $stmtEndereco = $this->conn->prepare(
                "INSERT INTO enderecos
                (
                    cep,
                    cidade,
                    bairro,
                    rua,
                    estado,
                    numero,
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
                )"
            );

            $stmtEndereco->execute([
                $endereco->getCep(),
                $endereco->getCidade(),
                $endereco->getBairro(),
                $endereco->getRua(),
                $endereco->getEstado(),
                $endereco->getNumero(),
                $idUsuario
            ]);

            $this->conn->commit();

            return true;

        } catch (Exception $e) {

            $this->conn->rollBack();

            throw new Exception(
                "Erro ao cadastrar funcionário: " . $e->getMessage()
            );
        }
    }

    public function listarFuncionarios()
    {
        $stmt = $this->conn->query(
            "SELECT * FROM usuarios WHERE deleted_at IS NULL"
        );

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];

        foreach($dados as $linha)
        {
            $usuario = new Usuario(
                $linha['nome'],
                $linha['email'],
                $linha['senha_hash'],
                $linha['cargo'],
                $linha['telefone']
            );

            $usuario->setId($linha['id_usuario']);

            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function listarTecnicos()
    {
        $stmt = $this->conn->query(
            "
                SELECT *
                FROM usuarios
                WHERE cargo = 'tecnico'
                AND ativo = 1
            "
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarIdFuncionario($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM usuarios WHERE id_usuario = ?"
        );

        $stmt->execute([$id]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$dados)
        {
            return null;
        }

        $usuario = new Usuario(
            $dados['nome'],
            $dados['email'],
            $dados['senha_hash'],
            $dados['cargo'],
            $dados['telefone']
        );

        $usuario->setId($dados['id_usuario']);

        return $usuario;
    }

    public function atualizarFuncionario(Usuario $usuario)
    {
        $stmt = $this->conn->prepare(
            "UPDATE usuarios
            SET
                nome = ?,
                email = ?,
                cargo = ?,
                telefone = ?
            WHERE id_usuario = ?"
        );

        $stmt->execute([
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getCargo(),
            $usuario->getTelefone(),
            $usuario->getId()
        ]);
    }

    public function excluirFuncionario($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE usuarios
            SET deleted_at = NOW()
            WHERE id_usuario = ?"
        );

        $stmt->execute([$id]);
    }
}
?>