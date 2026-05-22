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

    // =========================
    // MANUTENÇÕES EXECUTADAS
    // =========================

    public function formCadastrarManutencao()
    {
        Auth::check();

        require_once __DIR__ . "/../views/tecnico/manutencoes/cadastro.php";
    }

    public function cadastrarManutencao()
    {
        Auth::check();

        try {

            $descricaoServico = trim($_POST['descricao_servico']);

            $observacoes = trim($_POST['observacoes']);

            $tempoExecucao = $_POST['tempo_execucao_segundos'];

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

            $this->ordemRepository->concluirOrdem($idOrdem);

            $_SESSION['sucesso'] = "Manutenção cadastrada com sucesso.";

            header("Location: index.php?acao=manutencoes");

            exit;

        } catch(Exception $e) {
            $_SESSION['erro'] = $e->getMessage();

            header("Location: index.php?acao=form-manutencao");
            exit;
        }
    }

    public function endManutencao($id)
    {
        Auth::check();

        $this->ordemRepository->concluirOrdem($id);

        $_SESSION['sucesso'] = "Ordem concluída com sucesso.";

        header("Location: index.php?acao=manutencoes");

        exit;
    }
}