<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>

<h1>Funcionários</h1>

<a href="index.php?acao=form-funcionario">
    Cadastrar Funcionário
</a>

<hr>

<?php if(isset($_SESSION['sucesso'])): ?>

    <p>
        <?= $_SESSION['sucesso'] ?>
    </p>

    <?php unset($_SESSION['sucesso']); ?>

<?php endif; ?>

<?php if(isset($_SESSION['erro'])): ?>

    <p>
        <?= $_SESSION['erro'] ?>
    </p>

    <?php unset($_SESSION['erro']); ?>

<?php endif; ?>

<?php if(empty($usuarios)): ?>

    <p>Nenhum funcionário cadastrado.</p>

<?php else: ?>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($usuarios as $usuario): ?>

                <tr>

                    <td>
                        <?= $usuario['id_usuario'] ?>
                    </td>

                    <td>
                        <?= $usuario['nome'] ?>
                    </td>

                    <td>
                        <?= $usuario['email'] ?>
                    </td>

                    <td>
                        <?= ucfirst($usuario['cargo']) ?>
                    </td>

                    <td>
                        <?= $usuario['telefone'] ?>
                    </td>

                    <td>
                        <?= $usuario['cidade'] ?>
                    </td>

                    <td>
                        <?= $usuario['estado'] ?>
                    </td>

                    <td>

                        <?php if($usuario['ativo']): ?>

                            Ativo

                        <?php else: ?>

                            Inativo

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>

</body>
</html>