<?php

class Maquina
{
    private $id;
    private $nome;
    private $tipo;
    private $status = 'operando';
    private $descricao;

    private $sensorTemperatura;
    private $sensorVibracao;

    public function __construct(
        string $nome,
        string $tipo,
        string $status,
        string $descricao
    )
    {
        $this->setNome($nome);
        $this->setTipo($tipo);
        $this->setStatus($status);
        $this->setDescricao($descricao);
    }

    // GETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getSensorTemperatura()
    {
        return $this->sensorTemperatura;
    }

    public function getSensorVibracao()
    {
        return $this->sensorVibracao;
    }

    // SETTERS

    public function setId(int $id)
    {
        if($this->id === null)
        {
            $this->id = $id;
        }
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function setSensorTemperatura($sensor)
    {
        $this->sensorTemperatura = $sensor;
    }

    public function setSensorVibracao($sensor)
    {
        $this->sensorVibracao = $sensor;
    }
}