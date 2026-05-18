<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cargo;
    private ?string $telefone;

public function __construct(string $nome, string $email, string $senha, string $cargo, ?string $telefone = null)
{
    $this->setNome($nome);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setCargo($cargo);
    $this->setTelefone($telefone);
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
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

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }    

    public function setCargo(string $cargo)
    {
        $this->cargo = $cargo;
    }

    public function setTelefone(?string $telefone)
    {
        $this->telefone = $telefone;
    }
}

?>