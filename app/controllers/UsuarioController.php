<?php

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Endereco.php';
require_once __DIR__ . '/../models/UsuarioRepository.php';

class UsuarioController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }

    public function login()
    {
        try {

            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);

            $usuario = $this->repository->buscarPorEmail($email);

            if(!$usuario) {
                throw new Exception("Email ou senha inválidos.");
            }

            if(!password_verify($senha, $usuario->getSenha())) {
                throw new Exception("Email ou senha inválidos.");
            }

            $_SESSION['usuario'] = [
                'id' => $usuario->getId(),
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'cargo' => $usuario->getCargo()
            ];

            header("Location: index.php?acao=dashboard");

            exit;

        } catch(Exception $e) {

            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php");

            exit;
        }
    }

    public function logout()
    {
        session_destroy();

        header("Location: index.php");

        exit;
    }

    public function index()
    {
        $usuarios = $this->repository->ListarFuncionarios();

        require_once __DIR__ . '/../views/administrador/funcionarios/index.php';
    }

    public function formCadastrarFuncionario()
    {
        Auth::admin();

        require_once __DIR__ . '/../views/administrador/funcionarios/cadastro.php'; 
    }


    public function cadastrarFuncionario()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header("Location: index.php?acao=form-funcionario");

            exit;
        }

        Auth::admin();

        try {

            $senhaHash = password_hash(
                $_POST['senha'],
                PASSWORD_DEFAULT
            );

            $usuario = new Usuario(
                $_POST['nome'],
                $_POST['email'],
                $senhaHash,
                $_POST['cargo'],
                $_POST['telefone']
            );

            $endereco = new Endereco(
                $_POST['cep'],
                $_POST['cidade'],
                $_POST['bairro'],
                $_POST['rua'],
                $_POST['estado'],
                $_POST['numero']
            );

            $this->repository->createFuncionario(
                $usuario,
                $endereco
            );

            $_SESSION['sucesso'] = "Usuário cadastrado com sucesso";

            header("Location: index.php?acao=funcionarios");

            exit;

        } catch (Exception $e) {

            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=cadastrar-funcionario");

            exit;
        }
    }

    public function detalhesFuncionario()
    {
        Auth::admin();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Funcionário não encontrado.";

            header("Location: index.php?acao=funcionarios");

            exit;
        }

        $id = (int) $_GET['id'];

        $usuario = $this->repository->buscarIdFuncionario($id);

        if(!$usuario)
        {
            $_SESSION['erro'] = "Funcionário não encontrado.";

            header("Location: index.php?acao=funcionarios");

            exit;
        }

        require_once __DIR__ . "/../views/administrador/funcionarios/detalhes.php";
    }
}