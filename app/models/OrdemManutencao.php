<?php

class OrdemManutencao
{
    private $id;
    private $titulo;
    private $descricao;
    private $tipo;
    private $prioridade;
    private $status;
    private $dataAgendada;
    private $idMaquina;
    private $idUsuario;
    private $nomeTecnico;
    private $nomeMaquina;

    public function __construct(
        string $titulo,
        string $descricao,
        string $tipo,
        string $prioridade,
        string $status,
        string $dataAgendada,
        int $idMaquina,
        int $idUsuario
    )
    {
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
        $this->setTipo($tipo);
        $this->setPrioridade($prioridade);
        $this->setStatus($status);
        $this->setDataAgendada($dataAgendada);
        $this->setIdMaquina($idMaquina);
        $this->setIdUsuario($idUsuario);
    }

    // GETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getPrioridade(): string
    {
        return $this->prioridade;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDataAgendada(): string
    {
        return $this->dataAgendada;
    }

    public function getIdMaquina(): int
    {
        return $this->idMaquina;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    public function getNomeTecnico()
    {
        return $this->nomeTecnico;
    }

    public function getNomeMaquina()
    {
        return $this->nomeMaquina;
    }

    // SETTERS

    public function setId(int $id)
    {
        if ($this->id === null && $id > 0) {
            $this->id = $id;
        } else {
            throw new Exception("ID inválido.");
        }
    }

    public function setTitulo(string $titulo)
    {
        $titulo = trim($titulo);

        if (empty($titulo)) {
            throw new Exception("Título obrigatório.");
        }

        if (strlen($titulo) < 3 || strlen($titulo) > 150) {
            throw new Exception("Título inválido.");
        }

        $this->titulo = $titulo;
    }

    public function setDescricao(string $descricao)
    {
        $descricao = trim($descricao);

        if (empty($descricao)) {
            throw new Exception("Descrição obrigatória.");
        }

        if (strlen($descricao) < 5 || strlen($descricao) > 1000) {
            throw new Exception("Descrição inválida.");
        }

        $this->descricao = $descricao;
    }

    public function setTipo(string $tipo)
    {
        $tipo = strtolower(trim($tipo));

        $tiposValidos = [
            'preventiva',
            'corretiva',
            'preditiva',
            'inspecao'
        ];

        if (!in_array($tipo, $tiposValidos)) {
            throw new Exception("Tipo de manutenção inválido.");
        }

        $this->tipo = $tipo;
    }

    public function setPrioridade(string $prioridade)
    {
        $prioridade = strtolower(trim($prioridade));

        $prioridadesValidas = [
            'baixa',
            'media',
            'alta',
            'critica'
        ];

        if (!in_array($prioridade, $prioridadesValidas)) {
            throw new Exception("Prioridade inválida.");
        }

        $this->prioridade = $prioridade;
    }

    public function setStatus(string $status)
    {
        $status = strtolower(trim($status));

        $statusValidos = [
            'agendado',
            'em andamento',
            'concluido',
            'cancelado'
        ];

        if (!in_array($status, $statusValidos)) {
            throw new Exception("Status inválido.");
        }

        $this->status = $status;
    }

    public function setDataAgendada(string $dataAgendada)
    {
        $dataAgendada = trim($dataAgendada);

        if (empty($dataAgendada)) {
            throw new Exception("Data agendada obrigatória.");
        }

        $data = DateTime::createFromFormat('Y-m-d', $dataAgendada);

        if (!$data || $data->format('Y-m-d') !== $dataAgendada) {
            throw new Exception("Data agendada inválida.");
        }

        $this->dataAgendada = $dataAgendada;
    }

    public function setIdMaquina(int $idMaquina)
    {
        if ($idMaquina <= 0) {
            throw new Exception("ID da máquina inválido.");
        }

        $this->idMaquina = $idMaquina;
    }

    public function setIdUsuario(int $idUsuario)
    {
        if ($idUsuario <= 0) {
            throw new Exception("ID do usuário inválido.");
        }

        $this->idUsuario = $idUsuario;
    }

    public function setNomeTecnico(string $nomeTecnico)
    {
        $nomeTecnico = trim($nomeTecnico);

        if (empty($nomeTecnico)) {
            throw new Exception("Nome do técnico inválido.");
        }

        if (strlen($nomeTecnico) < 3 || strlen($nomeTecnico) > 100) {
            throw new Exception("Nome do técnico inválido.");
        }

        $this->nomeTecnico = $nomeTecnico;
    }

    public function setNomeMaquina(string $nomeMaquina)
    {
        $nomeMaquina = trim($nomeMaquina);

        if (empty($nomeMaquina)) {
            throw new Exception("Nome da máquina inválido.");
        }

        if (strlen($nomeMaquina) < 2 || strlen($nomeMaquina) > 100) {
            throw new Exception("Nome da máquina inválido.");
        }

        $this->nomeMaquina = $nomeMaquina;
    }
}