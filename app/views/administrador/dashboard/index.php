<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h1>Painel do Administrador</h1>

    <hr>

    <ul>

        <li>
            <a href="index.php?acao=maquinas">
                Máquinas
            </a>
        </li>

        <li>
            <a href="index.php?acao=funcionarios">
                Funcionários
            </a>
        </li>

        <li>
            <a href="index.php?acao=manutencoes">
                Manutenções
            </a>
        </li>

    </ul>

    <?php phpinfo(); ?> 

    <a href="index.php?acao=logout">
        Sair
    </a>
</body>
</html>