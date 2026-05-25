<?php

class Maquina
{
    private $id;
    private $nome;
    private $tipo;
    private $status;

    private $sensorTemperatura;
    private $sensorVibracao;

    public function __construct(
        string $nome,
        string $tipo,
        string $status,
    )
    {
        $this->setNome($nome);
        $this->setTipo($tipo);
        $this->setStatus($status);
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
        if ($this->id === null && $id > 0)
        {
            $this->id = $id;
        }
        else
        {
            throw new Exception("ID inválido.");
        }
    }

    public function setNome(string $nome)
    {
        $nome = trim($nome);

        if (empty($nome))
        {
            throw new Exception("Nome da máquina obrigatório.");
        }

        if (strlen($nome) < 2 || strlen($nome) > 100)
        {
            throw new Exception("Nome da máquina inválido.");
        }

        $this->nome = $nome;
    }

    public function setTipo(string $tipo)
    {
        $tipo = trim($tipo);

        if (empty($tipo))
        {
            throw new Exception("Tipo da máquina obrigatório.");
        }

        if (strlen($tipo) < 2 || strlen($tipo) > 50)
        {
            throw new Exception("Tipo da máquina inválido.");
        }

        $this->tipo = $tipo;
    }

    public function setStatus(string $status)
    {
        $status = strtolower(trim($status));

        $statusValidos = [
            'operando',
            'alerta',
            'critico',
            'manutencao',
            'inativo'
        ];

        if (!in_array($status, $statusValidos))
        {
            throw new Exception("Status inválido.");
        }

        $this->status = $status;
    }

    public function setSensorTemperatura($sensor)
    {
        if ($sensor === null)
        {
            throw new Exception("Sensor de temperatura inválido.");
        }

        $this->sensorTemperatura = $sensor;
    }

    public function setSensorVibracao($sensor)
    {
        if ($sensor === null)
        {
            throw new Exception("Sensor de vibração inválido.");
        }

        $this->sensorVibracao = $sensor;
    }
}