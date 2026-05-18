<?php

require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../models/OrdemManutencao.php";
require_once __DIR__ . "/../models/Manutencao.php";

require_once __DIR__ . "/../models/OrdemManutencaoRepository.php";
require_once __DIR__ . "/../models/ManutencaoRepository.php";

class ManutencaoController
{
    private $ordemRepository;
    private $manutencaoRepository;

    public function __construct()
    {
        $this->ordemRepository = new OrdemManutencaoRepository();

        $this->manutencaoRepository = new ManutencaoRepository();
    }

    // =========================
    // ORDENS DE MANUTENÇÃO
    // =========================

    public function index()
    {
        Auth::check();

        $this->ordemRepository->ordensPendentes();

        $ordens = $this->ordemRepository->listarOrdens();

        require_once __DIR__ . '/../views/administrador/manutencoes/index.php';
    }

    public function formCadastrarOrdem()
    {
        Auth::admin();

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
            $dataAgendada = $_POST['data_agendada'];

            $idMaquina = $_POST['id_maquina'];

            $idUsuario = $_SESSION['usuario']['id'];

            $ordem = new OrdemManutencao(
                $titulo,
                $descricao,
                $tipo,
                $prioridade,
                $dataAgendada,
                $idMaquina,
                $idUsuario
            );
    
            $this->ordemRepository->createOrdem($ordem);

            $_SESSION['sucesso'] = "Ordem cadastrada com sucesso.";

            header("Location: index.php?acao=manutencoes");

            exit;

        } catch(Exception $e) {

            die($e->getMessage());

            exit;
        }
    }

    // =========================
    // MANUTENÇÕES EXECUTADAS
    // =========================

    public function formCadastrarManutencao()
    {
        Auth::check();

        require_once __DIR__ . "/../views/administrador/manutencoes/cadastro-manutencao.php";
    }

    public function cadastrarManutencao()
    {
        Auth::check();

        try {

            $descricaoServico = trim($_POST['descricao_servico']);

            $observacoes = trim($_POST['observacoes']);

            $tempoExecucao = $_POST['tempo_execucao_minutos'];

            $idOrdem = $_POST['id_ordem'];

            $idUsuario = $_SESSION['usuario']['id'];

            $manutencao = new Manutencao(
                $descricaoServico,
                $observacoes,
                $tempoExecucao,
                $idOrdem,
                $idUsuario
            );

            $this->manutencaoRepository->createManutencao($manutencao);

            $_SESSION['sucesso'] = "Manutenção cadastrada com sucesso.";

            header("Location: index.php?acao=manutencoes");

            exit;

        } catch(Exception $e) {
            die($e->getMessage());
            exit;
        }
    }

    public function endManutencao($id)
    {
        $this->ordemRepository->concluirOrdem($id);

        header("Location: index.php?acao=manutencoes");
    }
}