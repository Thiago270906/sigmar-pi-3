<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquinas</title>
</head>
<script src="assets/js/cep.js"></script>
<body>

<h1>Cadastrar Máquina</h1>

<?php if(isset($_SESSION['erro'])): ?>

    <p>
        <?= $_SESSION['erro'] ?>
    </p>

    <?php unset($_SESSION['erro']); ?>

<?php endif; ?>

<form action="index.php?acao=cadastrar-maquina" method="POST">

    <input type="text" name="nome" placeholder="Nome">

    <input type="text" name="tipo" placeholder="Tipo">

    <textarea name="descricao"></textarea>

    <h3>Sensores</h3>

    <a href="index.php?acao=form-sensor">
        Cadastrar Sensor
    </a>

    <br><br>

    <?php if(!empty($_SESSION['sensores'])): ?>

        <table border="1" cellpadding="10">

            <tr>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Alerta</th>
                <th>Crítico</th>
                <th>Ação</th>
            </tr>

            <?php foreach($_SESSION['sensores'] as $index => $sensor): ?>

                <tr>

                    <td>
                        <?= $sensor['modelo'] ?>
                    </td>

                    <td>
                        <?= ucfirst($sensor['tipo']) ?>
                    </td>

                    <td>
                        <?= $sensor['limite_alerta'] ?>
                    </td>

                    <td>
                        <?= $sensor['limite_critico'] ?>
                    </td>

                    <td>

                        <a href="index.php?acao=remover-sensor&index=<?= $index ?>">
                            Remover
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    <?php endif; ?>

    <button type="submit">
        Cadastrar
    </button>

</form>
</body>
</html>