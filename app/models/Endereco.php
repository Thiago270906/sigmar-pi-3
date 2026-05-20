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
        if ($this->id === null && $id > 0) {
            $this->id = $id;
        } else {
            throw new Exception("ID inválido.");
        }
    }

    public function setCep(string $cep)
    {
        $cep = trim($cep);

        // Remove caracteres especiais
        $cepLimpo = preg_replace('/[^0-9]/', '', $cep);

        if (strlen($cepLimpo) !== 8) {
            throw new Exception("CEP inválido.");
        }

        $this->cep = $cepLimpo;
    }

    public function setCidade(string $cidade)
    {
        $cidade = trim($cidade);

        if (empty($cidade)) {
            throw new Exception("Cidade obrigatória.");
        }

        if (strlen($cidade) < 2 || strlen($cidade) > 100) {
            throw new Exception("Cidade inválida.");
        }

        $this->cidade = $cidade;
    }

    public function setBairro(string $bairro)
    {
        $bairro = trim($bairro);

        if (empty($bairro)) {
            throw new Exception("Bairro obrigatório.");
        }

        if (strlen($bairro) < 2 || strlen($bairro) > 100) {
            throw new Exception("Bairro inválido.");
        }

        $this->bairro = $bairro;
    }

    public function setRua(string $rua)
    {
        $rua = trim($rua);

        if (empty($rua)) {
            throw new Exception("Rua obrigatória.");
        }

        if (strlen($rua) < 2 || strlen($rua) > 150) {
            throw new Exception("Rua inválida.");
        }

        $this->rua = $rua;
    }

    public function setEstado(string $estado)
    {
        $estado = strtoupper(trim($estado));

        $ufsValidas = [
            'AC','AL','AP','AM','BA','CE','DF','ES','GO',
            'MA','MT','MS','MG','PA','PB','PR','PE','PI',
            'RJ','RN','RS','RO','RR','SC','SP','SE','TO'
        ];

        if (!in_array($estado, $ufsValidas)) {
            throw new Exception("Estado inválido.");
        }

        $this->estado = $estado;
    }

    public function setNumero(string $numero)
    {
        $numero = trim($numero);

        if (empty($numero)) {
            throw new Exception("Número obrigatório.");
        }

        if (strlen($numero) > 10) {
            throw new Exception("Número inválido.");
        }

        $this->numero = $numero;
    }

    public function setIdUsuario(int $idUsuario)
    {
        if ($idUsuario <= 0) {
            throw new Exception("ID do usuário inválido.");
        }

        $this->idUsuario = $idUsuario;
    }
}

?>