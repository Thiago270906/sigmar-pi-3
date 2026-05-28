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
        $this->ordemRepository->ordensagendadas();

            $status = $_GET['status'] ?? null;

            if($status)
            {
                $ordens = $this->ordemRepository->filtrarStatusOrdem($status);
            }
            else
            {
                $ordens = $this->ordemRepository->listarOrdens();
            }

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

        $usuarios = $this->usuarioRepository->listarTecnicos();

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

        // NOVO
        $manutencao = null;

        if($ordem->getStatus() === 'concluida')
        {
            $manutencao = $this->manutencaoRepository->buscarPorOrdem($id);
        }

        if($_SESSION['usuario']['cargo'] === 'admin') {

            require_once __DIR__ . "/../views/administrador/manutencoes/detalhes.php";

        } else {

            require_once __DIR__ . "/../views/tecnico/manutencoes/detalhes.php";
        }
    }

    public function resumoManutencoesRecentes()
    {
        $ordens = $this->ordemRepository->listarOrdens();

        $manutencoesRecentes = [];

        $hoje = new DateTime();

        foreach($ordens as $ordem)
        {
            $status = strtolower(trim($ordem->getStatus()));

            $dataConclusao = $ordem->getDataConclusao();

            // =========================
            // PENDENTES + EM ANDAMENTO
            // =========================
            if($status === 'pendente' || $status === 'em_andamento')
            {
                $manutencoesRecentes[] = $ordem;
                continue;
            }

            // =========================
            // CONCLUÍDAS - ÚLTIMOS 7 DIAS (melhorado)
            // =========================
            if($status === 'concluida')
            {
                if(!empty($dataConclusao))
                {
                    try {
                        $data = new DateTime($dataConclusao);

                        $diff = $hoje->diff($data)->days;

                        // Aumentei para 7 dias (mais útil)
                        if($diff <= 7)
                        {
                            $manutencoesRecentes[] = $ordem;
                        }
                    } catch (Exception $e) {
                        // Ignora datas inválidas
                        continue;
                    }
                }
            }
        }

        return $manutencoesRecentes;
    }
    
    public function formEditarOrdem()
    {
        Auth::admin();

        if (!isset($_GET['id'])) {
            $_SESSION['erro'] = "ID da ordem não informado.";
            header("Location: index.php?acao=manutencoes");
            exit;
        }

        $id = (int) $_GET['id'];

        $ordem = $this->ordemRepository->buscarIdOrdem($id);

        if (!$ordem) {
            $_SESSION['erro'] = "Ordem não encontrada.";
            header("Location: index.php?acao=manutencoes");
            exit;
        }

        $status = strtolower(trim($ordem->getStatus()));

        if ($status === 'concluida' || $status === 'em_andamento') {
            $_SESSION['erro'] = "Não é possível editar ordens com status '{$status}'.";
            header("Location: index.php?acao=manutencoes");
            exit;
        }

        $maquinas = $this->maquinaRepository->listarMaquinas();
        $usuarios = $this->usuarioRepository->listarTecnicos();

        require_once __DIR__ . "/../views/administrador/manutencoes/editar.php";
    }

    public function editarOrdem()
    {
        Auth::admin();

        try {
            $id = (int) $_POST['id_ordem'];

            $ordemAtual = $this->ordemRepository->buscarIdOrdem($id);

            if (!$ordemAtual) {
                throw new Exception("Ordem não encontrada.");
            }

            // Bloqueio de segurança (caso alguém tente editar via POST)
            $status = strtolower(trim($ordemAtual->getStatus()));
            if ($status === 'concluida' || $status === 'em_andamento') {
                throw new Exception("Não é possível editar ordens com status '{$status}'.");
            }

            $titulo = trim($_POST['titulo']);
            $descricao = trim($_POST['descricao']);
            $tipo = trim($_POST['tipo']);
            $prioridade = trim($_POST['prioridade']);
            $dataAgendada = $_POST['data_agendada'];
            $idMaquina = $_POST['id_maquina'];
            $idUsuario = $_POST['id_usuario'];

            $ordem = new OrdemManutencao(
                $titulo,
                $descricao,
                $tipo,
                $prioridade,
                'agendada',           // Reseta status conforme solicitado
                $dataAgendada,
                $idMaquina,
                $idUsuario
            );

            $ordem->setId($id);

            $this->ordemRepository->updateOrdem($ordem);

            $_SESSION['sucesso'] = "Ordem atualizada com sucesso.";

            header("Location: index.php?acao=manutencoes");
            exit;

        } catch (Exception $e) {
            $_SESSION['erro'] = $e->getMessage();
            header("Location: index.php?acao=editar-ordem&id=" . $_POST['id_ordem']);
            exit;
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
            if (!isset($_SESSION['ordem_finalizada'])) {
                throw new Exception("Nenhuma ordem selecionada para finalização.");
            }

            $idOrdem = $_SESSION['ordem_finalizada'];

            $descricaoServico = trim($_POST['descricao_servico'] ?? '');
            
            $observacoes = trim($_POST['observacoes'] ?? '');

            if (empty($descricaoServico)) {
                throw new Exception("Descrição do serviço é obrigatória.");
            }

            $idUsuario = $_SESSION['usuario']['id'];

            $manutencao = new Manutencao(
                $descricaoServico,
                $observacoes,
                $idOrdem,
                $idUsuario
            );

            $this->manutencaoRepository->createManutencao($manutencao);

            $this->ordemRepository->concluirOrdem($idOrdem);

            unset($_SESSION['ordem_finalizada']);
            unset($_SESSION['data_conclusao']);

            $_SESSION['sucesso'] = "Manutenção finalizada e cadastrada com sucesso.";

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

        if($_SESSION['usuario']['cargo'] === 'admin') {

            Auth::admin();

            require_once __DIR__ . "/../views/administrador/manutencoes/detalhes.php";

        } else {

            Auth::tecnico();

            require_once __DIR__ . "/../views/tecnico/manutencoes/detalhes.php";
        }
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

        $_SESSION['ordem_finalizada'] = $id;

        // ESSA LINHA FALTAVA
        $_SESSION['data_conclusao'] = date('Y-m-d H:i:s');

        header("Location: index.php?acao=form-manutencao");

        exit;
    }
}