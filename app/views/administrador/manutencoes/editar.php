<?php
require_once __DIR__ . '/../../../models/OrdemManutencao.php';
/** @var OrdemManutencao $ordem */
/** @var array $usuarios */
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem de Manutenção</title>
</head>
<body>

    <h1>Editar Ordem de Manutenção</h1>

    <?php if(isset($_SESSION['erro'])): ?>
        <p style="color: red;"><?= $_SESSION['erro'] ?></p>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <form action="index.php?acao=editar-ordem" method="POST">

        <input type="hidden" name="id_ordem" value="<?= $ordem->getId() ?>">

        <label>Título:</label><br>
        <input type="text" name="titulo" value="<?= htmlspecialchars($ordem->getTitulo()) ?>" required>
        <br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao" required><?= htmlspecialchars($ordem->getDescricao()) ?></textarea>
        <br><br>

        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="preventiva" <?= $ordem->getTipo() === 'preventiva' ? 'selected' : '' ?>>Preventiva</option>
            <option value="corretiva" <?= $ordem->getTipo() === 'corretiva' ? 'selected' : '' ?>>Corretiva</option>
            <option value="preditiva" <?= $ordem->getTipo() === 'preditiva' ? 'selected' : '' ?>>Preditiva</option>
        </select>
        <br><br>

        <label>Prioridade:</label><br>
        <select name="prioridade" required>
            <option value="baixa" <?= $ordem->getPrioridade() === 'baixa' ? 'selected' : '' ?>>Baixa</option>
            <option value="media" <?= $ordem->getPrioridade() === 'media' ? 'selected' : '' ?>>Média</option>
            <option value="alta" <?= $ordem->getPrioridade() === 'alta' ? 'selected' : '' ?>>Alta</option>
            <option value="urgente" <?= $ordem->getPrioridade() === 'urgente' ? 'selected' : '' ?>>Urgente</option>
        </select>
        <br><br>

        <label>Data Agendada:</label><br>
        <input type="date" name="data_agendada" value="<?= $ordem->getDataAgendada() ?>" required>
        <br><br>

        <!-- MÁQUINA - SOMENTE VISUALIZAÇÃO -->
        <label>Máquina:</label><br>
        <input type="text" value="<?= htmlspecialchars($ordem->getNomeMaquina() ?? 'Máquina ID: ' . $ordem->getIdMaquina()) ?>" readonly style="background:#f0f0f0;">
        <input type="hidden" name="id_maquina" value="<?= $ordem->getIdMaquina() ?>">
        <br><br>

        <label>Técnico:</label><br>
        <select name="id_usuario" required>
            <option value="">Selecione o técnico</option>
            <?php foreach($usuarios as $u): ?>
                <option value="<?= $u->getId() ?>" <?= $u->getId() == $ordem->getIdUsuario() ? 'selected' : '' ?>>
                    <?= $u->getId() ?># <?= htmlspecialchars($u->getNome()) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>
</html>