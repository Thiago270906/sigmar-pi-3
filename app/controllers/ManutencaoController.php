<?php

require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../models/OrdemManutencao.php";
require_once __DIR__ . "/../models/Manutencao.php";

require_once __DIR__ . "/../models/OrdemManutencaoRepository.php";
require_once __DIR__ . "/../models/ManutencaoRepository.php";
require_once __DIR__ . "/../models/MaquinaRepository.php";
require_once __DIR__ . "/../models/UsuarioRepository.php";

class ManutencaoController
{
    private $ordemRepository;
    private $manutencaoRepository;
    private $maquinaRepository;
    private $usuarioRepository;

    public function __construct()
    {
        $this->ordemRepository = new OrdemManutencaoRepository();

        $this->manutencaoRepository = new ManutencaoRepository();

        $this->maquinaRepository = new MaquinaRepository();

        $this->usuarioRepository = new UsuarioRepository();
    }

    // =========================
    // ORDENS DE MANUTENÇÃO
    // =========================

    public function indexAdmin()
    {
        Auth::admin();

        $this->ordemRepository->ordensPendentes();

        $ordens = $this->ordemRepository->listarOrdens();

        require_once __DIR__ . '/../views/administrador/manutencoes/index.php';
    }

    public function indexTecnico()
    {   
        Auth::tecnico();

        $idUsuario = $_SESSION['usuario']['id'];

        $ordens = $this->ordemRepository->listarOrdemTecnico($idUsuario);

        require_once __DIR__ . '/../views/tecnico/manutencoes/index.php';
    }

    public function formCadastrarOrdem()
    {
        Auth::admin();

        $maquinas = $this->maquinaRepository->listarMaquinas();

        $tecnicos = $this->usuarioRepository->listarTecnicos();

        require_once __DIR__ . "/../views/administrador/manutencoes/cadastro.php";
    }

    public function cadastrarOrdem()
    {
        Auth::admin();

        try {

            $titulo = trim($_POST['titulo']);
            $descricao = trim($_POST['descricao']);
            $tipo = trim($_POST['tipo']);
            $prioridade = trim($_POST['prioridade']);
            $status = 'agendada';
            $dataAgendada = $_POST['data_agendada'];

            $idMaquina = $_POST['id_maquina'];

            $idUsuario = $_POST['id_usuario'];

            $ordem = new OrdemManutencao(
                $titulo,
                $descricao,
                $tipo,
                $prioridade,
                $status,
                $dataAgendada,
                $idMaquina,
                $idUsuario
            );
    
            $this->ordemRepository->createOrdem($ordem);

            $_SESSION['sucesso'] = "Ordem cadastrada com sucesso.";

            header("Location: index.php?acao=manutencoes");

            exit;

        } catch(Exception $e) {

            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-Ordem");

            exit;
        }
    }

    public function detalhesOrdem()
    {
        Auth::check();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        $id = (int) $_GET['id'];

        $ordem = $this->ordemRepository->buscarIdOrdem($id);

        if(!$ordem)
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        if($_SESSION['usuario']['cargo'] === 'admin') {

        Auth::admin();

        require_once __DIR__ . "/../views/administrador/manutencoes/detalhes.php";
        } else {

        Auth::tecnico();

            require_once __DIR__ . "/../views/tecnico/manutencoes/detalhes.php";
        }
    }

    // =========================
    // MANUTENÇÕES EXECUTADAS
    // =========================

    public function formCadastrarManutencao()
    {
        Auth::check();

        if(!isset($_SESSION['ordem_finalizada']))
        {
            $_SESSION['erro'] = "Nenhuma ordem finalizada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        $idOrdem = $_SESSION['ordem_finalizada'];

        $ordem = $this->ordemRepository->buscarIdOrdem($idOrdem);

        require_once __DIR__ . "/../views/tecnico/manutencoes/cadastro.php";
    }

    public function cadastrarManutencao()
    {
        Auth::check();

        try {

            if(!isset($_SESSION['ordem_finalizada']))
            {
                throw new Exception("Nenhuma ordem finalizada.");
            }

            $descricaoServico = trim($_POST['descricao_servico']);

            $observacoes = trim($_POST['observacoes']);

            $idOrdem = $_SESSION['ordem_finalizada'];

            $idUsuario = $_SESSION['usuario']['id'];

            $manutencao = new Manutencao(
                $descricaoServico,
                $observacoes,
                $idOrdem,
                $idUsuario
            );

            $this->manutencaoRepository->createManutencao($manutencao);

            unset($_SESSION['ordem_finalizada']);

            $_SESSION['sucesso'] = "Manutenção cadastrada com sucesso.";

            header("Location: index.php?acao=manutencoes");

            exit;

        } catch(Exception $e) {

            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-manutencao");

            exit;
        }
    }

    public function detalhesManutencao()
    {
        Auth::check();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        $id = (int) $_GET['id'];

        $manutencao = $this->manutencaoRepository->buscarIdManutencao($id);

        if(!$manutencao)
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        require_once __DIR__ . "/../views/tecnico/manutencoes/detalhes.php";
    }

    public function iniciarManutencao()
    {
        Auth::check();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        $id = (int) $_GET['id'];

        $this->ordemRepository->comecarOrdem($id);

        $_SESSION['sucesso'] = "Manutenção Iniciada com sucesso!";

        header("Location: index.php?acao=detalhes-manutencao&id=" . $id);
    }

    public function finalizarManutencao()
    {
        Auth::check();

        if(!isset($_GET['id']))
        {
            $_SESSION['erro'] = "Ordem não encontrada.";

            header("Location: index.php?acao=manutencoes");

            exit;
        }

        $id = (int) $_GET['id'];

        $this->ordemRepository->concluirOrdem($id);

        $_SESSION['ordem_finalizada'] = $id;

        // ESSA LINHA FALTAVA
        $_SESSION['data_conclusao'] = date('Y-m-d H:i:s');

        header("Location: index.php?acao=form-manutencao");

        exit;
    }
}