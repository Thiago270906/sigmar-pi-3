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

<?php if(isset($_SESSION['erro'])): ?>

    <p>
        <?= $_SESSION['erro']; ?>
    </p>

    <?php unset($_SESSION['erro']); ?>

<?php endif; ?>

<?php if(empty($maquinas)): ?>

    <p>Nenhuma máquina cadastrada.</p>

<?php else: ?>

    <table border="1" cellpadding="10">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Sensor Temperatura</th>
                <th>Sensor Vibração</th>
                <th>Detalhes</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach($maquinas as $maquina): ?>

                <tr>

                    <td>
                        <?= $maquina->getId(); ?>
                    </td>

                    <td>
                        <?= $maquina->getNome(); ?>
                    </td>

                    <td>
                        <?= ucfirst($maquina->getTipo()); ?>
                    </td>

                    <td>
                        <?= ucfirst($maquina->getStatus()); ?>
                    </td>

                    <!-- SENSOR TEMPERATURA -->

                    <td>

                        <?php if($maquina->getSensorTemperatura()): ?>

                            <?= $maquina->getSensorTemperatura()->getModelo(); ?>

                        <?php else: ?>

                            Nenhum sensor

                        <?php endif; ?>

                    </td>

                    <!-- SENSOR VIBRAÇÃO -->

                    <td>

                        <?php if($maquina->getSensorVibracao()): ?>

                            <?= $maquina->getSensorVibracao()->getModelo(); ?>

                        <?php else: ?>

                            Nenhum sensor

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="/pi-3/public/index.php?acao=detalhes-maquina&id=<?= $maquina->getId(); ?>">
                            Ver detalhes
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>

</body>
</html>