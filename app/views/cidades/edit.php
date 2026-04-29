<h2>Nova cidade</h2>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color: green;">Cidade salva com sucesso!</p>
<?php endif; ?>

<form method="POST">

    <input type="hidden" name="id" value="<?= $cidade->getId(); ?>">

    <label>Nome: </label>
    <input type="text" name="nome" value="<?= $cidade->getNome();?>" required>
    <br><br>

    <label>Estado: </label>
    <input type="text" name="estado" maxlength="2" value="<?= $cidade->getEstado();?>"  required>
    <br><br>

    <button type="submit">Atualizar</button>
</form>