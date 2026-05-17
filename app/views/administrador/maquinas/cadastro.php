<h1>Cadastrar Máquina</h1>

<?php if(isset($_SESSION['erro'])): ?>

    <p>
        <?= $_SESSION['erro'] ?>
    </p>

    <?php unset($_SESSION['erro']); ?>

<?php endif; ?>

<form action="index.php?acao=cadastrar-maquina" method="POST">

    <input type="text" name="nome" placeholder="Nome">

    <input type="text" name="tipo" placeholder="Tipo">

    <select name="status">
        <option value="operando">Operando</option>
        <option value="alerta">Alerta</option>
        <option value="critico">Crítico</option>
    </select>

    <textarea name="descricao"></textarea>

    <button type="submit">
        Cadastrar
    </button>

</form>