<h2>Lista de cidades</h2>

<a style="color: white; background-color: blue; padding: 10px;"
    href="index.php?action=create">Nova Cidade</a>
<hr>

<?php foreach ($cidades as $cidade): ?>

    ID: <?=  $cidade->getId(); ?> <br>
    Nome: <?=  $cidade->getNome(); ?> <br>
    Estado: <?=  $cidade->getEstado(); ?> <br>
    <a href="index.php?edit=1&id=<?= $cidade->getId(); ?>">Editar</a>
    <a href="index.php?delete=1&id=<?= $cidade->getId(); ?>"
    onclick="return confirm('Tem certeza que deseja excluir')">Excluir
    </a>
    <hr>

<?php endforeach; ?>