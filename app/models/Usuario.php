<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cargo;
    private ?string $telefone;

    public function __construct(
        string $nome,
        string $email,
        string $senha,
        string $cargo,
        ?string $telefone = null
    )
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
            throw new Exception("Nome obrigatório.");
        }

        if (strlen($nome) < 3 || strlen($nome) > 100)
        {
            throw new Exception("Nome inválido.");
        }

        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/u", $nome))
        {
            throw new Exception("Nome contém caracteres inválidos.");
        }

        $this->nome = $nome;
    }

    public function setEmail(string $email)
    {
        $email = trim($email);

        if (empty($email))
        {
            throw new Exception("Email obrigatório.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("Email inválido.");
        }

        if (strlen($email) > 150)
        {
            throw new Exception("Email muito longo.");
        }

        $this->email = strtolower($email);
    }

    public function setSenha(string $senha)
    {
        $senha = trim($senha);

        if (empty($senha))
        {
            throw new Exception("Senha obrigatória.");
        }

        if (strlen($senha) < 6)
        {
            throw new Exception("A senha deve ter pelo menos 6 caracteres.");
        }

        if (strlen($senha) > 255)
        {
            throw new Exception("Senha inválida.");
        }

        // opcional:
        // hash automático da senha
        $this->senha = ($senha);
    }

    public function setCargo(string $cargo)
    {
        $cargo = strtolower(trim($cargo));

        $cargosValidos = [
            'admin',
            'tecnico'
        ];

        if (!in_array($cargo, $cargosValidos))
        {
            throw new Exception("Cargo inválido.");
        }

        $this->cargo = $cargo;
    }

    public function setTelefone(?string $telefone)
    {
        if ($telefone === null || trim($telefone) === '')
        {
            $this->telefone = null;
            return;
        }

        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        if (strlen($telefone) < 10 || strlen($telefone) > 11)
        {
            throw new Exception("Telefone inválido.");
        }

        $this->telefone = $telefone;
    }
}

?>