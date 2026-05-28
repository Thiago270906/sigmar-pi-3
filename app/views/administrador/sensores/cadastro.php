<?php
/** 
 * @var bool $isEdicao 
 * @var int|null $idMaquina 
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Sensor</title>
</head>
<body>

<h1>Cadastrar Sensor</h1>

<form action="index.php?acao=adicionar-sensor" method="POST">

    <input type="hidden" name="is_edicao" value="<?= $isEdicao ? 1 : 0 ?>">

    <?php if($isEdicao && $idMaquina > 0): ?>
        <input type="hidden" name="id_maquina" value="<?= $idMaquina ?>">
    <?php endif; ?>

    <input
        type="text"
        name="modelo"
        placeholder="Modelo"
        required
    >

    <br><br>

    <select name="tipo" id="tipo" required>

        <option value="">
            Selecione o tipo
        </option>

        <option value="temperatura">
            Temperatura
        </option>

        <option value="vibracao">
            Vibração
        </option>

    </select>

    <br><br>

    <input
        type="number"
        step="0.01"
        name="limite_alerta"
        placeholder="Limite de alerta"
        required
    >

    <br><br>

    <div id="campo-critico">

        <input
            type="number"
            step="0.01"
            name="limite_critico"
            placeholder="Limite crítico"
        >

    </div>

    <br>

    <button type="submit">
        Adicionar Sensor
    </button>

</form>

<script>

const tipo = document.getElementById('tipo');

const campoCritico =
    document.getElementById('campo-critico');

tipo.addEventListener('change', function()
{
    if(this.value === 'vibracao')
    {
        campoCritico.style.display = 'none';
    }
    else
    {
        campoCritico.style.display = 'block';
    }
});

</script>

</body>
</html>