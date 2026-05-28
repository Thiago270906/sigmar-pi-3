<?php

require_once __DIR__ . '/../../../models/OrdemManutencao.php';

/** @var OrdemManutencao $ordem */
/** @var Manutencao $manutencao */

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Detalhes da Manutenção</title>
</head>
<body>

    <h1>Detalhes da Manutenção</h1>

    <div class="card">
        <h2>Informações da Ordem</h2>

        <p>
            <strong>ID:</strong>
            <?= $ordem->getId(); ?>
        </p>

        <p>
            <strong>Nome:</strong>
            <?= $ordem->getTitulo(); ?>
        </p>

        <p>
            <strong>Tipo:</strong>
            <?= $ordem->getDescricao(); ?>
        </p>

        <p>
            <strong>Status:</strong>
            <?= $ordem->getTipo(); ?>
        </p>

        <p>
            <strong>Descrição:</strong>
            <?= $ordem->getPrioridade(); ?>
        </p>
        <p>
            <strong>Descrição:</strong>
            <?= $ordem->getStatus(); ?>
        </p>
        <p>
            <strong>Descrição:</strong>
            <?= $ordem->getDataAgendada(); ?>
        </p>
        <p>
            <strong>Descrição:</strong>
            <?= $ordem->getPrioridade(); ?>
        </p>
        <p>
            <strong>ID Técnico:</strong>
            <?= $ordem->getIdUsuario(); ?>
        </p>
        <p>
            <strong>Técnico:</strong>
            <?= $ordem->getNomeTecnico(); ?>
        </p>
        <hr>
        <h2>Informações da Máquina</h2>

        <p>
            <strong>Máquina:</strong>
            <?= $ordem->getNomeMaquina(); ?>
        </p>

        <p>
            <strong>Tipo:</strong>
            <?= $ordem->getTipoMaquina(); ?>
        </p>

        <p>
            <strong>Status:</strong>
            <?= $ordem->getStatusMaquina(); ?>
        </p>
    </div>

    <?php if($manutencao): ?>

        <hr>

        <h2>Manutenção Executada</h2>

        <p>
            <strong>Serviço:</strong>
            <?= $manutencao->getDescricaoServico(); ?>
        </p>

        <p>
            <strong>Observações:</strong>
            <?= $manutencao->getObservacoes(); ?>
        </p>

        <p>
            <strong>Data Início:</strong>
            <?=  $ordem->getDataInicio() ?>
        </p>

        <p>
            <strong>Data Início:</strong>
            <?=  $ordem->getDataConclusao() ?>
        </p>

    <?php endif; ?>

    <a href="index.php?acao=manutencoes">
        Voltar
    </a>
    <br>
    <br>
    <?php if($ordem->getStatus() === 'agendada' || $ordem->getStatus() === 'pendente' ):?>
        <a href="index.php?acao=form-editar-ordem&id=<?= $ordem->getId(); ?>">
            editar
        </a>
    <?php endif; ?>

</body>
</html>