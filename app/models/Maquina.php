<?php 

class Maquina
{
    private $id;
    private $nome;
    private $tipo;
    private $status;
    private $descricao;

    public function __construct(string $nome, string $tipo, string $status, string $descricao)
    {
        $this->setNome($nome);
        $this->setTipo($tipo);
        $this->setStatus($status);
        $this->setDescricao($descricao);
    }

    // Getters

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

    // Setters

    public function setId(int $id)
    {
        if ($this->id === null) {
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
}

?>