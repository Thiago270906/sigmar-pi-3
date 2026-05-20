<?php

class Sensor
{
    private $id;
    private $modelo;
    private $tipo;
    private $limiteAlerta;
    private $limiteCritico;
    private $status = 'ativo';
    private $dataInstalacao;
    private $dataTroca;
    private $idMaquina;

    public function __construct(
        string $modelo,
        string $tipo,
        float $limiteAlerta,
        float $limiteCritico,
        int $idMaquina
    )
    {
        $this->setModelo($modelo);
        $this->setTipo($tipo);
        $this->setLimiteAlerta($limiteAlerta);
        $this->setLimiteCritico($limiteCritico);
        $this->setIdMaquina($idMaquina);
    }

    // =========================
    // GETTERS
    // =========================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getLimiteAlerta(): float
    {
        return $this->limiteAlerta;
    }

    public function getLimiteCritico(): float
    {
        return $this->limiteCritico;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDataInstalacao()
    {
        return $this->dataInstalacao;
    }

    public function getDataTroca()
    {
        return $this->dataTroca;
    }

    public function getIdMaquina(): int
    {
        return $this->idMaquina;
    }

    // =========================
    // SETTERS
    // =========================

    public function setId(int $id)
    {
        if($this->id === null)
        {
            $this->id = $id;
        }
    }

    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setLimiteAlerta(float $limiteAlerta)
    {
        $this->limiteAlerta = $limiteAlerta;
    }

    public function setLimiteCritico(float $limiteCritico)
    {
        $this->limiteCritico = $limiteCritico;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function setDataInstalacao($dataInstalacao)
    {
        $this->dataInstalacao = $dataInstalacao;
    }

    public function setDataTroca($dataTroca)
    {
        $this->dataTroca = $dataTroca;
    }

    public function setIdMaquina(int $idMaquina)
    {
        $this->idMaquina = $idMaquina;
    }
}

?>