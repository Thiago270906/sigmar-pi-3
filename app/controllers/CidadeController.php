<?php

require_once __DIR__ . '/../models/Cidade.php';
require_once __DIR__ . '/../models/CidadeRepository.php';

class CidadeController
{
    private $repository;        //Guarda o objeto que acessa o banco de dados

    public function __construct()
    {
        $this->repository =  new CidadeRepository();
    }

    // Listando todas as cidades
    public function index()                         // index() -> Lista todas as cidades; Cada método do Controller é uma ação
    {
        $cidades = $this->repository->listar();     // listar() -> Método da classo no CidadeRepository, armazenando no $cidades

        // Enviando dados para a View
        require __DIR__ . '/../views/cidades/index.php';       // require -> Carrega o arquivo da View que tem acesso à variável $cidades
    }

    public function create()
    {
        require __DIR__ . '/../views/cidades/create.php';
    }

    // Cria e salva uma nova cidade
    public function store()         // store() -> Salva/Guarda um novo registro no banco de dados, nesse caso, uma nova cidade.
    {
        $nome = $_POST['nome'];
        $estado = $_POST['estado'];

        try {
            $cidade = new Cidade("$nome", "$estado");
            $this->repository->salvar($cidade);
            // Redireciona após salvar
            header("Location: index.php?sucesso=1");
            exit;

        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage(); 
        }
        

        }
        
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("ID não informado.");
        }
        $cidade = $this->repository->buscarPorId($id);
        if (!$cidade) {
            die("Cidade não encontrada");
        }
        require __DIR__ . '/../views/cidades/edit.php';
    }
    
    public function update()    
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $estado = $_POST['estado'];
        try {
            $cidade = new Cidade($nome, $estado);
            $cidade->setId($id);
            $this->repository->atualizar($cidade);
            header("Location: index.php?sucesso=2");
            exit;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("ID não informado");
        }
        try {
            $this->repository->excluir($id);
            header("Location: index.php?sucesso=3");
            exit;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

?>