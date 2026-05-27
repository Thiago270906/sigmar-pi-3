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
<form method="POST" action="index.php?acao=simular-leituras">

    <?php if($maquina->getSensorTemperatura()): ?>

        <?php $sensor = $maquina->getSensorTemperatura(); ?>

        <h3>Sensor Temperatura</h3>

        <p>
            Valor Atual:
            <?= $sensor->getValorAtual(); ?>
            <?= $sensor->getUnidade(); ?>
        </p>

        <input
            type="hidden"
            name="sensores[<?= $sensor->getId(); ?>][id]"
            value="<?= $sensor->getId(); ?>"
        >

        <input
            type="number"
            step="0.01"
            name="sensores[<?= $sensor->getId(); ?>][valor]"
        >

    <?php endif; ?>
    <?php if($maquina->getSensorVibracao()): ?>

        <?php $sensor = $maquina->getSensorVibracao(); ?>

        <h3>Sensor Vibração</h3>

        <p>
            Valor Atual:
            <?= $sensor->getValorAtual(); ?>
            <?= $sensor->getUnidade(); ?>
        </p>

        <input
            type="hidden"
            name="sensores[<?= $sensor->getId(); ?>][id]"
            value="<?= $sensor->getId(); ?>"
        >

        <input
            type="number"
            step="0.01"
            name="sensores[<?= $sensor->getId(); ?>][valor]"
        >

    <?php endif; ?>

    <button type="submit">
        Simular Leituras
    </button>
</form>
</body>
</html>