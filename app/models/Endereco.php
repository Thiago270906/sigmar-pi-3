<?php 

class Endereco
{
    private $id;
    private $cep;
    private $cidade;
    private $bairro;
    private $rua;
    private $estado;
    private $numero;
    private $idUsuario;

    public function __construct(
        string $cep,
        string $cidade,
        string $bairro,
        string $rua,
        string $estado,
        string $numero,
    ) {
        $this->setCep($cep);
        $this->setCidade($cidade);
        $this->setBairro($bairro);
        $this->setRua($rua);
        $this->setEstado($estado);
        $this->setNumero($numero);
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    // Setters

    public function setId(int $id)
    {
        if ($this->id === null) {
            $this->id = $id;
        }
    }

    public function setCep(string $cep)
    {
        $cep = trim($cep);

        if (empty($cep)) {
            throw new Exception("CEP é um campo obrigatório");
        }

        $this->cep = $cep;
    }

    public function setCidade(string $cidade)
    {
        $cidade = trim($cidade);

        if (empty($cidade)) {
            throw new Exception("Cidade é um campo obrigatório");
        }

        $this->cidade = $cidade;
    }

    public function setBairro(string $bairro)
    {
        $bairro = trim($bairro);

        if (empty($bairro)) {
            throw new Exception("Bairro é um campo obrigatório");
        }

        $this->bairro = $bairro;
    }

    public function setRua(string $rua)
    {
        $rua = trim($rua);

        if (empty($rua)) {
            throw new Exception("Rua é um campo obrigatório");
        }

        $this->rua = $rua;
    }

    public function setEstado(string $estado)
    {
        $estado = strtoupper(trim($estado));

        if (strlen($estado) != 2) {
            throw new Exception("Estado inválido");
        }

        $this->estado = $estado;
    }

    public function setNumero(string $numero)
    {
        $numero = trim($numero);

        if (empty($numero)) {
            throw new Exception("Número é um campo obrigatório");
        }

        $this->numero = $numero;
    }

    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}

?>