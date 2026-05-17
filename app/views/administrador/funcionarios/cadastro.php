<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
</head>
<body>

    <h1>Cadastrar Funcionário</h1>

    <?php if(isset($_SESSION['erro'])): ?>

        <p>
            <?= $_SESSION['erro'] ?>
        </p>

        <?php unset($_SESSION['erro']); ?>

    <?php endif; ?>

    <form action="index.php?acao=cadastrar-funcionario" method="POST">

        <h3>Dados do Funcionário</h3>

        <br>

        <input type="text" name="nome" placeholder="Nome" required>

        <br><br>

        <input type="email" name="email" placeholder="Email" required>

        <br><br>

        <input type="password" name="senha" placeholder="Senha" required>

        <br><br>

        <input type="text" name="telefone" placeholder="Telefone" maxlength="11" required>

        <br><br>

        <select name="cargo" required>

            <option value="">
                Selecione o Cargo
            </option>

            <option value="admin">
                Administrador
            </option>

            <option value="tecnico">
                Técnico
            </option>

        </select>

        <br><br>

        <hr>

        <h3>Endereço</h3>

        <br>

        <input 
            type="text" 
            name="cep"
            id="cep"
            placeholder="CEP"
            maxlength="9"
            onblur="pesquisaCep(this.value)"
            required
        >

        <br><br>

        <input type="text" name="rua" id="rua" placeholder="Rua" readonly>

        <br><br>

        <input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly>

        <br><br>

        <input type="text" name="cidade" id="cidade" placeholder="Cidade" readonly>

        <br><br>

        <input type="text" name="estado" id="estado" placeholder="Estado" maxlength="2" readonly>

        <br><br>

        <input type="text" name="numero" placeholder="Número" required>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <script src="assets/js/cep.js"></script>

</body>
</html>