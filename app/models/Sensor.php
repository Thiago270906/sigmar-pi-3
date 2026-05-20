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
        if ($this->id === null && $id > 0)
        {
            $this->id = $id;
        }
        else
        {
            throw new Exception("ID inválido.");
        }
    }

    public function setModelo(string $modelo)
    {
        $modelo = trim($modelo);

        if (empty($modelo))
        {
            throw new Exception("Modelo do sensor obrigatório.");
        }

        if (strlen($modelo) < 2 || strlen($modelo) > 100)
        {
            throw new Exception("Modelo do sensor inválido.");
        }

        $this->modelo = $modelo;
    }

    public function setTipo(string $tipo)
    {
        $tipo = strtolower(trim($tipo));

        $tiposValidos = [
            'temperatura',
            'vibracao'
        ];

        if (!in_array($tipo, $tiposValidos))
        {
            throw new Exception("Tipo de sensor inválido.");
        }

        $this->tipo = $tipo;
    }

    public function setLimiteAlerta(float $limiteAlerta)
    {
        if ($limiteAlerta <= 0)
        {
            throw new Exception("Limite de alerta inválido.");
        }

        $this->limiteAlerta = $limiteAlerta;
    }

    public function setLimiteCritico(float $limiteCritico)
    {
        if ($limiteCritico <= 0)
        {
            throw new Exception("Limite crítico inválido.");
        }

        if ($limiteCritico <= $this->limiteAlerta)
        {
            throw new Exception("Limite crítico deve ser maior que o alerta.");
        }

        $this->limiteCritico = $limiteCritico;
    }

    public function setStatus(string $status)
    {
        $status = strtolower(trim($status));

        $statusValidos = [
            'ativo',
            'inativo'
        ];

        if (!in_array($status, $statusValidos))
        {
            throw new Exception("Status do sensor inválido.");
        }

        $this->status = $status;
    }

    public function setDataInstalacao($dataInstalacao)
    {
        $dataInstalacao = trim($dataInstalacao);

        $data = DateTime::createFromFormat('Y-m-d H:i:s', $dataInstalacao);

        if (!$data)
        {
            // tenta apenas data simples
            $data = DateTime::createFromFormat('Y-m-d', $dataInstalacao);
        }

        if (!$data)
        {
            throw new Exception("Data de instalação inválida.");
        }

        $this->dataInstalacao = $dataInstalacao;
    }

    public function setDataTroca($dataTroca)
    {
        if (empty($dataTroca))
        {
            $this->dataTroca = null;
            return;
        }

        $dataTroca = trim($dataTroca);

        $data = DateTime::createFromFormat('Y-m-d H:i:s', $dataTroca);

        if (!$data)
        {
            $data = DateTime::createFromFormat('Y-m-d', $dataTroca);
        }

        if (!$data)
        {
            throw new Exception("Data de troca inválida.");
        }

        $this->dataTroca = $dataTroca;
    }

    public function setIdMaquina(int $idMaquina)
    {
        if ($idMaquina <= 0)
        {
            throw new Exception("ID da máquina inválido.");
        }

        $this->idMaquina = $idMaquina;
    }
}

?>