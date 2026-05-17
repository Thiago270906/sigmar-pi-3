<?php

require_once __DIR__ . '/../models/UsuarioRepository.php';
class UsuarioController
{
    private $repository;        //Guarda o objeto que acessa o banco de dados

    public function __construct()
    {
        $this->repository =  new UsuarioRepository();
    }
    public function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $this->repository->buscarPorEmail($email);

        if(!$usuario) {

            $_SESSION['erro'] = "Usuário incorreta";

            header("Location: index.php");
            
            exit;
        }

        if(!password_verify($senha, $usuario['senha_hash'])) {
            $_SESSION['erro'] = "Senha incorreta";
            
            header("Location: index.php");
            } else {
                
            $_SESSION['usuario'] = $usuario;
                
                            
                $_SESSION['usuario'] = [
                    'id' => $usuario['id_usuario'],
                    'nome' => $usuario['nome'],
                    'cargo' => $usuario['cargo']
                ];
                
                header("Location: index.php?acao=dashboard");
            }
        }

    public function logout()
    {
        session_destroy();

        header("Location: index.php");

        exit;
    }
}
