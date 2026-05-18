<!-- views/administrador/manutencoes/index.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Manutenção</title>
</head>
<body>

<h1>Ordens de Manutenção</h1>

<a href="index.php?acao=form-ordem">
    Cadastrar Ordem
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

<?php if(empty($ordens)): ?>

    <p>Nenhuma ordem cadastrada.</p>

<?php else: ?>

    <table border="1" cellpadding="10">

        <thead>

            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th>Data</th>
                <th>Técnico</th>
                <th>Máquina</th>
                <th>Detalhes</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach($ordens as $ordem): ?>

                <tr>

                    <td>
                        <?= $ordem->getId() ?>
                    </td>

                    <td>
                        <?= $ordem->getTitulo() ?>
                    </td>

                    <td>
                        <?= ucfirst($ordem->getTipo()) ?>
                    </td>

                    <td>
                        <?= ucfirst($ordem->getPrioridade()) ?>
                    </td>

                    <td>
                        <?= ucfirst($ordem->getStatus()) ?>
                    </td>

                    <td>
                        <?= $ordem->getDataAgendada() ?>
                    </td>

                    <td>
                        <?= $ordem->getNomeTecnico() ?>
                    </td>

                    <td>
                        <?= $ordem->getNomeMaquina() ?>
                    </td>

                    <td>

                        <a href="index.php?acao=detalhes-ordem&id=<?= $ordem->getId() ?>">
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