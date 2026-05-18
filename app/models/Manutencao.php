<?php

class Manutencao
{
    private $id;
    private $descricaoServico;
    private $observacoes;
    private $tempoExecucao;
    private $idOrdem;
    private $idUsuario;

    public function __construct(
        string $descricaoServico,
        string $observacoes,
        int $tempoExecucao,
        int $idOrdem,
        int $idUsuario
    )
    {
        $this->setDescricaoServico($descricaoServico);
        $this->setObservacoes($observacoes);
        $this->setTempoExecucao($tempoExecucao);
        $this->setIdOrdem($idOrdem);
        $this->setIdUsuario($idUsuario);
    }

    // GETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricaoServico(): string
    {
        return $this->descricaoServico;
    }

    public function getObservacoes(): string
    {
        return $this->observacoes;
    }

    public function getTempoExecucao(): int
    {
        return $this->tempoExecucao;
    }

    public function getIdOrdem(): int
    {
        return $this->idOrdem;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    // SETTERS

    public function setId(int $id)
    {
        if($this->id === null) {
            $this->id = $id;
        }
    }

    public function setDescricaoServico(string $descricaoServico)
    {
        $this->descricaoServico = $descricaoServico;
    }

    public function setObservacoes(string $observacoes)
    {
        $this->observacoes = $observacoes;
    }

    public function setTempoExecucao(int $tempoExecucao)
    {
        $this->tempoExecucao = $tempoExecucao;
    }

    public function setIdOrdem(int $idOrdem)
    {
        $this->idOrdem = $idOrdem;
    }

    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}