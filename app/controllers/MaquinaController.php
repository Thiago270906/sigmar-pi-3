<?php

require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../models/Maquina.php";
require_once __DIR__ . "/../models/MaquinaRepository.php";

class MaquinaController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new MaquinaRepository();
    }

    public function index()
    {
        Auth::admin();

        $maquinas = $this->repository->findAll();

        require_once __DIR__ . "/../views/administrador/maquinas/index.php";
    }

    public function formCadastrar()
    {
        Auth::admin();

        require_once __DIR__ . "/../views/administrador/maquinas/cadastro.php";
    }

    public function cadastrarMaquina()
    {
        Auth::admin();

        try
        {
            $nome = trim($_POST['nome']);
            $tipo = trim($_POST['tipo']);
            $status = trim($_POST['status']);
            $descricao = trim($_POST['descricao']);

            $maquina = new Maquina(
                $nome,
                $tipo,
                $status,
                $descricao
            );

            $this->repository->createMaquina($maquina);

            $_SESSION['sucesso'] = "Máquina cadastrada com sucesso.";

            header("Location: index.php?acao=maquinas");

            exit;
        }
        catch(Exception $e)
        {
            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-maquina");

            exit;
        }
    }
}