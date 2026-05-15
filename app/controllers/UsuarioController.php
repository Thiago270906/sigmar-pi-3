<?php
require_once __DIR__ . '/../models/UsuarioRepository.php';
class UsuarioController
{
    public function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $repo = new UsuarioRepository();

        $usuario = $repo->buscarPorEmail($email);

        if(!$usuario) {
            die("Usuário inválido");
        }

        if(password_verify($senha, $usuario['senha_hash'])) {

            $_SESSION['usuario'] = $usuario;

            
            $_SESSION['usuario'] = [
                'id' => $usuario['id_usuario'],
                'nome' => $usuario['nome'],
                'cargo' => $usuario['cargo']
            ];

            header("Location: index.php?acao=dashboard");
                
        } else {

            echo "Senha inválida";
        }
    }
}