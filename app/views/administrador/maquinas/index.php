<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquinas</title>
</head>
<body>

<h1>Máquinas</h1>

<a href="/pi-3/public/index.php?acao=form-maquina">
    Cadastrar Máquina
</a>

<hr>

<?php if(isset($_SESSION['sucesso'])): ?>

    <p>
        <?= $_SESSION['sucesso']; ?>
    </p>

    <?php unset($_SESSION['sucesso']); ?>

<?php endif; ?>

<?php if(empty($maquinas)): ?>

    <p>Nenhuma máquina cadastrada.</p>

<?php else: ?>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Descrição</th>
        </tr>

        <?php foreach($maquinas as $maquina): ?>

            <tr>

                <td>
                    <?= $maquina->getId(); ?>
                </td>

                <td>
                    <?= $maquina->getNome(); ?>
                </td>

                <td>
                    <?= $maquina->getTipo(); ?>
                </td>

                <td>
                    <?= $maquina->getStatus(); ?>
                </td>

                <td>
                    <?= $maquina->getDescricao(); ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

<?php endif; ?>

</body>
</html>