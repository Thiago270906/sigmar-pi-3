<?php

require_once __DIR__ . '/../../../models/Maquina.php';

/** @var Maquina $maquina */

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Detalhes da Máquina</title>
</head>
<body>

    <h1>Detalhes da Máquina</h1>

    <div class="card">
        <h2>Informações da Máquina</h2>

        <p>
            <strong>ID:</strong>
            <?= $maquina->getId(); ?>
        </p>

        <p>
            <strong>Nome:</strong>
            <?= $maquina->getNome(); ?>
        </p>

        <p>
            <strong>Tipo:</strong>
            <?= $maquina->getTipo(); ?>
        </p>

        <p>
            <strong>Status:</strong>
            <?= $maquina->getStatus(); ?>
        </p>
    </div>

    <div class="card">

        <h2>Sensor de Temperatura</h2>

        <?php if($maquina->getSensorTemperatura()) : ?>

            <p>
                <strong>Modelo:</strong>
                <?= $maquina->getSensorTemperatura()->getModelo(); ?>
            </p>

            <p>
                <strong>Limite de Alerta:</strong>
                <?= $maquina->getSensorTemperatura()->getLimiteAlerta(); ?>
            </p>

            <p>
                <strong>Limite Crítico:</strong>
                <?= $maquina->getSensorTemperatura()->getLimiteCritico(); ?>
            </p>

        <?php else : ?>

            <p>Nenhum sensor de temperatura cadastrado.</p>

        <?php endif; ?>

    </div>

    <div class="card">

        <h2>Sensor de Vibração</h2>

        <?php if($maquina->getSensorVibracao()) : ?>

            <p>
                <strong>Modelo:</strong>
                <?= $maquina->getSensorVibracao()->getModelo(); ?>
            </p>

            <p>
                <strong>Limite de Alerta:</strong>
                <?= $maquina->getSensorVibracao()->getLimiteAlerta(); ?>
            </p>

            <p>
                <strong>Limite Crítico:</strong>
                <?= $maquina->getSensorVibracao()->getLimiteCritico(); ?>
            </p>

        <?php else : ?>

            <p>Nenhum sensor de vibração cadastrado.</p>

        <?php endif; ?>

    </div>

    <a href="index.php?acao=maquinas">
        Voltar
    </a>
    <br>
    <br>
    <a href="index.php?acao=form-simular-maquina&id=<?= $maquina->getId(); ?>">
        simular
    </a>
</body>
</html>