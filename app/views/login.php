<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - SIGMAR</title>
</head>

<body>

    <h1>Login SIGMAR</h1>

    <form action="index.php?acao=login" method="POST">

        <input type="email" name="email">

        <input type="password" name="senha">

        <button type="submit">
            Entrar
        </button>

        <?php if(isset($_SESSION['erro'])): ?>

            <p>
                <?= $_SESSION['erro'] ?>
            </p>

            <?php unset($_SESSION['erro']); ?>

        <?php endif; ?>

    </form>

</body>
</html>