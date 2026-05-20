<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?acao=cadastrar-ordem" method="POST">

        <input type="text" name="titulo" placeholder="Título" required>

        <br><br>

        <textarea 
            name="descricao"
            placeholder="Descrição">
        </textarea>

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
            type="datetime-local"
            name="data_agendada"
            required
        >

        <br><br>

        <input 
            type="number"
            name="id_maquina"
            placeholder="ID da máquina"
            required
        >

        <br><br>

        <input 
            type="number"
            name="id_usuario"
            placeholder="ID do Usuário"
            required
        >

        <br><br>

        <button type="submit">
            Cadastrar Ordem
        </button>

    </form>
</body>
</html>