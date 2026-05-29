<?php

require_once __DIR__ . '/../../../models/Maquina.php';

/** @var Maquina $maquina */

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMAR - Editar Máquina</title>
</head>
<body>

    <h1>Editar Máquina</h1>

    <?php if(isset($_SESSION['erro'])): ?>
        <p style="color: red;"><?= $_SESSION['erro'] ?></p>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>
        <p style="color: green;"><?= $_SESSION['sucesso'] ?></p>
        <?php unset($_SESSION['sucesso']); ?>
    <?php endif; ?>

    <form action="index.php?acao=editar-maquina" method="POST">

        <input type="hidden" name="id_maquina" value="<?= $maquina->getId() ?>">

        <h3>Dados da Máquina</h3>

        <label>Nome da Máquina:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($maquina->getNome()) ?>" required>
        <br><br>

        <label>Tipo:</label><br>
        <input type="text" name="tipo" value="<?= htmlspecialchars($maquina->getTipo()) ?>" required>
        <br><br>

        <p><strong>Status atual:</strong> <?= htmlspecialchars($maquina->getStatus()) ?></p>

        <hr>

        <h3>Sensores Atuais</h3>

        <?php if(!empty($sensoresExistentes)): ?>
            <?php foreach($sensoresExistentes as $sensor): ?>
                <div style="margin-bottom: 10px; padding: 8px; background: #f8f8f8; border: 1px solid #ddd;">
                    <strong><?= htmlspecialchars($sensor->getModelo()) ?></strong> - 
                    <?= htmlspecialchars($sensor->getTipo()) ?>
                    
                    <a href="index.php?acao=trocar-sensor&id_sensor=<?= $sensor->getId() ?>&id_maquina=<?= $maquina->getId() ?>">
                        [Trocar Sensor]
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p><em>Nenhum sensor ativo encontrado.</em></p>
        <?php endif; ?>

        <!-- Sensores em processo de troca (pendentes) -->
        <?php if(isset($_SESSION['sensores_troca']) && count($_SESSION['sensores_troca']) > 0): ?>
            <hr>
            <h4>Trocas Pendentes (serão aplicadas ao salvar)</h4>
            <?php foreach($_SESSION['sensores_troca'] as $index => $item): ?>
                <div style="margin-bottom: 8px; padding: 8px; background: #fff3cd; border: 1px solid #ffeaa7;">
                    <strong>Novo Sensor:</strong> <?= htmlspecialchars($item['novo']['modelo']) ?> 
                    (<?= htmlspecialchars($item['novo']['tipo']) ?>)
                    <br>
                    <small>Substituindo sensor ID: <?= $item['antigo_id'] ?></small>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <br><br>

        <button type="submit" style="padding: 10px 20px; font-size: 16px;">
            Salvar Alterações da Máquina
        </button>

    </form>

</body>
</html>