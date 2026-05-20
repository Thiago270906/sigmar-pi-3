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

    <input
        type="number"
        step="0.01"
        name="limite_critico"
        placeholder="Limite crítico"
        required
    >

    <br><br>

    <button type="submit">
        Adicionar Sensor
    </button>

</form>

</body>
</html>