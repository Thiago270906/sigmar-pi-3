<?php

require_once __DIR__ . '/../../../models/Usuario.php';

/** @var Usuario $usuario */

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Detalhes do Funcionário</title>
</head>
<body>

    <h1>
        Detalhes do Funcionário
    </h1>

    <hr>

    <p>
        <strong>ID:</strong>
        <?= $usuario->getId() ?>
    </p>

    <p>
        <strong>Nome:</strong>
        <?= htmlspecialchars($usuario->getNome()) ?>
    </p>

    <p>
        <strong>Email:</strong>
        <?= htmlspecialchars($usuario->getEmail()) ?>
    </p>

    <p>
        <strong>Cargo:</strong>
        <?= htmlspecialchars($usuario->getCargo()) ?>
    </p>

    <p>
        <strong>Telefone:</strong>

        <?php if($usuario->getTelefone()): ?>

            <?= htmlspecialchars($usuario->getTelefone()) ?>

        <?php else: ?>

            Não informado

        <?php endif; ?>

    </p>

    <p>
        <strong>Data de Cadastro:</strong>

        <?= date('d/m/Y H:i', strtotime($usuario->getCriadaEm())) ?>

    </p>

    <?php if($usuario->getEndereco()): ?>

        <p>
            <strong>CEP:</strong>
            <?= $usuario->getEndereco()->getCep() ?>
        </p>

        <p>
            <strong>Cidade:</strong>
            <?= $usuario->getEndereco()->getCidade() ?>
        </p>

        <p>
            <strong>Bairro:</strong>
            <?= $usuario->getEndereco()->getBairro() ?>
        </p>

        <p>
            <strong>Rua:</strong>
            <?= $usuario->getEndereco()->getRua() ?>
        </p>

        <p>
            <strong>Estado:</strong>
            <?= $usuario->getEndereco()->getEstado() ?>
        </p>

        <p>
            <strong>Número:</strong>
            <?= $usuario->getEndereco()->getNumero() ?>
        </p>

    <?php endif; ?>

    <hr>

    <a href="index.php?acao=funcionarios">
        Voltar
    </a>

    |

    <a href="index.php?acao=editar-funcionario&id=<?= $usuario->getId() ?>">
        Editar
    </a>

    |

    <a 
        href="index.php?acao=remover-funcionario&id=<?= $usuario->getId() ?>"
        onclick="return confirm('Deseja realmente remover este funcionário?')"
    >
        Remover
    </a>

</body>
</html>