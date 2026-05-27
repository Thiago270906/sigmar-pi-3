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

<form action="index.php?acao=cadastrar-ordem" method="POST">

    <input 
        type="text"
        name="titulo"
        placeholder="Título"
        required
    >

    <br><br>

    <textarea 
        name="descricao"
        placeholder="Descrição"
        required
    ></textarea>

    <br><br>

    <select name="tipo" required>

        <option value="">
            Tipo da manutenção
        </option>

        <option value="preventiva">
            Preventiva
        </option>

        <option value="corretiva">
            Corretiva
        </option>

        <option value="preditiva">
            Preditiva
        </option>

    </select>

    <br><br>

    <select name="prioridade" required>

        <option value="">
            Prioridade
        </option>

        <option value="baixa">
            Baixa
        </option>

        <option value="media">
            Média
        </option>

        <option value="alta">
            Alta
        </option>

        <option value="urgente">
            Urgente
        </option>

    </select>

    <br><br>

    <input 
        type="date"
        name="data_agendada"
        min="<?= date('Y-m-d'); ?>"
        required
    >

    <br><br>

    <select name="id_maquina" required>

        <option value="">
            Selecione a máquina
        </option>

        <?php if(!empty($maquinas)): ?>

            <?php foreach($maquinas as $maquina): ?>

                <option value="<?= $maquina->getId(); ?>">

                    <?= $maquina->getId() . "# ". $maquina->getNome(); ?>

                </option>

            <?php endforeach; ?>

        <?php endif; ?>

    </select>

    <br><br>

    <select name="id_usuario" required>

        <option value="">
            Selecione o técnico
        </option>

        <?php if(!empty($usuarios)): ?>

            <?php foreach($usuarios as $usuario): ?>

                <option value="<?= $usuario['id_usuario']; ?>">

                    <?= $usuario->getId() . "# ".  $usuario['nome']; ?>

                </option>

            <?php endforeach; ?>

        <?php endif; ?>

    </select>

    <br><br>

    <button type="submit">
        Cadastrar Ordem
    </button>

</form>

</body>
</html>