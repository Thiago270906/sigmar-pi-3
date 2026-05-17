<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

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
        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch();
    }

    public function createFuncionario(Usuario $usuario, Endereco $endereco)
    {
        try {

            $this->conn->beginTransaction();

            $sqlUsuario = "
                INSERT INTO usuarios
                (
                    nome,
                    email,
                    senha_hash,
                    cargo,
                    telefone
                )
                VALUES
                (
                    :nome,
                    :email,
                    :senha,
                    :cargo,
                    :telefone
                )
            ";

            $stmtUsuario = $this->conn->prepare($sqlUsuario);

            $stmtUsuario->bindValue(':nome', $usuario->getNome());
            $stmtUsuario->bindValue(':email', $usuario->getEmail());
            $stmtUsuario->bindValue(':senha', $usuario->getSenha());
            $stmtUsuario->bindValue(':cargo', $usuario->getCargo());
            $stmtUsuario->bindValue(':telefone', $usuario->getTelefone());

            $stmtUsuario->execute();

            $idUsuario = $this->conn->lastInsertId();

            $sqlEndereco = "
                INSERT INTO enderecos
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
                    :cep,
                    :cidade,
                    :bairro,
                    :rua,
                    :estado,
                    :numero,
                    :id_usuario
                )
            ";

            $stmtEndereco = $this->conn->prepare($sqlEndereco);

            $stmtEndereco->bindValue(':cep', $endereco->getCep());
            $stmtEndereco->bindValue(':cidade', $endereco->getCidade());
            $stmtEndereco->bindValue(':bairro', $endereco->getBairro());
            $stmtEndereco->bindValue(':rua', $endereco->getRua());
            $stmtEndereco->bindValue(':estado', $endereco->getEstado());
            $stmtEndereco->bindValue(':numero', $endereco->getNumero());
            $stmtEndereco->bindValue(':id_usuario', $idUsuario);

            $stmtEndereco->execute();

            $this->conn->commit();

            return true;

        } catch (Exception $e) {

            $this->conn->rollBack();

            throw new Exception(
                "Erro ao cadastrar usuário: " . $e->getMessage()
            );
        }
    }

    public function listarFuncionarios()
    {
        $sql = "
            SELECT
                usuarios.id_usuario,
                usuarios.nome,
                usuarios.email,
                usuarios.cargo,
                usuarios.telefone,
                usuarios.ativo,

                enderecos.cep,
                enderecos.cidade,
                enderecos.bairro,
                enderecos.rua,
                enderecos.estado,
                enderecos.numero

            FROM usuarios

            INNER JOIN enderecos
                ON usuarios.id_usuario = enderecos.id_usuario

            WHERE usuarios.deleted_at IS NULL
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}