<h2>Nova cidade</h2>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color: green;">Cidade salva com sucesso!</p>
<?php endif; ?>

<form method="POST" action="index.php">

    <label>Nome: </label>
    <input type="text" name="nome" required>
    <br><br>

    <label>Estado: </label>
    <input type="text" name="estado" maxlength="2" required>
    <br><br>

    <button type="submit">Salvar</button>
</form>