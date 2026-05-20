<?php

class OrdemManutencao
{
    private $id;
    private $titulo;
    private $descricao;
    private $tipo;
    private $prioridade;
    private $status = 'agendado';
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
        if($this->id === null) {
            $this->id = $id;
        }
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setPrioridade(string $prioridade)
    {
        $this->prioridade = $prioridade;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setDataAgendada(string $dataAgendada)
    {
        $this->dataAgendada = $dataAgendada;
    }

    public function setIdMaquina(int $idMaquina)
    {
        $this->idMaquina = $idMaquina;
    }

    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNomeTecnico(string $nomeTecnico)
    {
        $this->nomeTecnico = $nomeTecnico;
    }

    public function setNomeMaquina(string $nomeMaquina)
    {
        $this->nomeMaquina = $nomeMaquina;
    }

}