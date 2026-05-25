<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Cadastro de Manutenção
    </title>
</head>

<body>

    <h1>
        Registrar Manutenção
    </h1>

    <?php if(isset($_SESSION['erro'])): ?>

        <p>
            <?= $_SESSION['erro']; ?>
        </p>

        <?php unset($_SESSION['erro']); ?>

    <?php endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>

        <p>
            <?= $_SESSION['sucesso']; ?>
        </p>

        <?php unset($_SESSION['sucesso']); ?>

    <?php endif; ?>

    <form 
        action="index.php?acao=cadastrar-manutencao"
        method="POST"
    >

    <?php if(isset($ordem) && $ordem->getDataInicio()): ?>

        <p>
            <strong>Data de início:</strong>

            <?= date(
                'd/m/Y H:i',
                strtotime($ordem->getDataInicio())
            ); ?>
        </p>

    <?php endif; ?>

    <?php if(isset($_SESSION['data_conclusao'])): ?>

        <p>
            <strong>Data de término:</strong>

            <?= date(
                'd/m/Y H:i',
                strtotime($_SESSION['data_conclusao'])
                
            ); ?>
        </p>

    <?php endif; ?>
        <br>

        <textarea
            name="descricao_servico"
            placeholder="Descrição do serviço realizado"
            required
        ></textarea>

        <br><br>

        <textarea
            name="observacoes"
            placeholder="Observações"
        ></textarea>

        <br><br>

        <?php if(isset($_SESSION['ordem_finalizada'])): ?>

            <input
                type="hidden"
                name="id_ordem"
                value="<?= $_SESSION['ordem_finalizada']; ?>"
            >

            <p>
                Ordem vinculada:
                #<?= $_SESSION['ordem_finalizada']; ?>
            </p>

        <?php else: ?>

            <input
                type="number"
                name="id_ordem"
                placeholder="ID da Ordem"
                required
            >

        <?php endif; ?>

        <br><br>

        <button type="submit">
            Cadastrar Manutenção
        </button>

    </form>

</body>
</html>