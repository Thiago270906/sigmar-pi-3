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
        $this->cep = $cep;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    public function setRua(string $rua)
    {
        $this->rua = $rua;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}

?>