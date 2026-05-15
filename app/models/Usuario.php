<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cargo;
    private $telefone;

    public function __construct(string $nome, string $email, string $senha, string $cargo, int $telefone)
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

    public function getTelefone(): string
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
        $nome = trim($nome);

        // Simples validação
        if (empty($nome)) {
            throw new Exception("Nome é um campo obrigatório");
        }
        $this->nome = $nome;
    }

    public function setEmail(string $email)
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido.");
        }

        $this->email = $email;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }    

    public function setCargo(string $cargo)
    {
        $cargo = strtolower(trim($cargo));

        if ($cargo != 'tecnico' && $cargo != 'administrador') {
            throw new Exception("Cargo inválido.");
        }

        $this->cargo = $cargo;
    }

    public function setTelefone(int $telefone) 
    {
        if (strlen($telefone) < 10 || strlen($telefone) > 11) {
            throw new Exception("Telefone inválido.");
        }
    }
}

?>