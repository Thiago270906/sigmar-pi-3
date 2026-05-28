<?php
require_once __DIR__ . '/../../../models/Usuario.php';

/** @var Usuario $usuario */

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>

    <h1>Editar Funcionário</h1>

    <?php if(isset($_SESSION['erro'])): ?>
        <p style="color: red;">
            <?= $_SESSION['erro'] ?>
        </p>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <form action="index.php?acao=editar-funcionario" method="POST">

        <input type="hidden" name="id_usuario" value="<?= $usuario->getId() ?>">

        <h3>Dados do Funcionário</h3>

        <input type="text" name="nome" value="<?= $usuario->getNome() ?>" required>
        <br><br>

        <input type="email" name="email" value="<?= $usuario->getEmail() ?>" required>
        <br><br>

        <input type="text" name="telefone" value="<?= $usuario->getTelefone() ?>" maxlength="11">
        <br><br>

        <select name="cargo" required>
            <option value="">Selecione o Cargo</option>
            <option value="admin" <?= $usuario->getCargo() === 'admin' ? 'selected' : '' ?>>Administrador</option>
            <option value="tecnico" <?= $usuario->getCargo() === 'tecnico' ? 'selected' : '' ?>>Técnico</option>
        </select>

        <br><br>
        <hr>
        <h3>Endereço</h3>

        <?php $end = $usuario->getEndereco(); ?>

        <input type="text" name="cep" id="cep" value="<?= $end ? $end->getCep() : '' ?>" maxlength="9" onblur="pesquisaCep(this.value)">
        <br><br>

        <input type="text" name="rua" id="rua" value="<?= $end ? $end->getRua() : '' ?>" readonly>
        <br><br>

        <input type="text" name="bairro" id="bairro" value="<?= $end ? $end->getBairro() : '' ?>" readonly>
        <br><br>

        <input type="text" name="cidade" id="cidade" value="<?= $end ? $end->getCidade() : '' ?>" readonly>
        <br><br>

        <input type="text" name="estado" id="estado" value="<?= $end ? $end->getEstado() : '' ?>" maxlength="2" readonly>
        <br><br>

        <input type="text" name="numero" value="<?= $end ? $end->getNumero() : '' ?>" required>
        <br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <script src="assets/js/cep.js"></script>

</body>
</html>