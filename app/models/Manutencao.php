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
        if ($this->id === null && $id > 0) {
            $this->id = $id;
        } else {
            throw new Exception("ID inválido.");
        }
    }

    public function setDescricaoServico(string $descricaoServico)
    {
        $descricaoServico = trim($descricaoServico);

        if (empty($descricaoServico)) {
            throw new Exception("Descrição do serviço obrigatória.");
        }

        if (strlen($descricaoServico) < 5 || strlen($descricaoServico) > 500) {
            throw new Exception("Descrição do serviço inválida.");
        }

        $this->descricaoServico = $descricaoServico;
    }

    public function setObservacoes(string $observacoes)
    {
        $observacoes = trim($observacoes);

        // observação pode ser vazia
        if (strlen($observacoes) > 1000) {
            throw new Exception("Observações muito longas.");
        }

        $this->observacoes = $observacoes;
    }

    public function setTempoExecucao(int $tempoExecucao)
    {
        if ($tempoExecucao <= 0) {
            throw new Exception("Tempo de execução inválido.");
        }

        if ($tempoExecucao > 259200) {
            throw new Exception("Tempo de execução muito alto.");
        }

        $this->tempoExecucao = $tempoExecucao;
    }

    public function setIdOrdem(int $idOrdem)
    {
        if ($idOrdem <= 0) {
            throw new Exception("ID da ordem inválido.");
        }

        $this->idOrdem = $idOrdem;
    }

    public function setIdUsuario(int $idUsuario)
    {
        if ($idUsuario <= 0) {
            throw new Exception("ID do usuário inválido.");
        }

        $this->idUsuario = $idUsuario;
    }
}