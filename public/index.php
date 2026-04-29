<?php
require_once __DIR__ . '/../app/controllers/CidadeController.php';

$controller = new CidadeController();

$action = $_GET['action'] ?? null;

// Se for POST -> SALVAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $controller->update(); // edição
    } else {
        $controller->store(); // criação
    }
} elseif ($action === 'create') {
    $controller->create(); 
} elseif (isset($_GET['delete'])) {
    $controller->delete(); 
} elseif (isset($_GET['edit'])) {
    $controller->edit(); 
} else {
    $controller->index();
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $controller->store(); // Para testar inserção / salvar
// } else {
//     $controller->create();
// }




/* Para testar o listar
$controller->index();

 try {
    $repository = new CidadeRepository();

    $cidade = new Cidade("Mogi Mirim", "SP");

    //Salvando no banco
    $repository->salvar($cidade);

    echo "<h3>Cidade salva com sucesso!</h3>";

    //Listando cidades
    $cidades = $repository->$listar();

    foreach ($cidades as $cidade) {

        echo "ID: " . $cidade->getId() . "<br>";
        echo "ID: " . $cidade->getNome() . "<br>";
        echo "ID: " . $cidade->getEstado() . "<br>";
        echo "<hr>";
    }

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
*/

?>