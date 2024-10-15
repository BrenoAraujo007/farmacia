<?php
function getPDO() {
    $host = 'localhost';
    $dbname = 'farmacia';
    $username = 'root';
    $password = 'breno';
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

function addMedicamento($pdo, $medicamento, $quantidade, $preco, $categoria, $validade) {
    $sql = $pdo->prepare("INSERT INTO medicamentos (medicamento, quantidade, preco, categoria, validade) VALUES (?, ?, ?, ?, ?)");
    $sql->execute([$medicamento, $quantidade, $preco, $categoria, $validade]);
    echo 'Adicionado com sucesso';
}

if (isset($_POST['medicamento'])) {
    $pdo = getPDO();
    addMedicamento($pdo, $_POST['medicamento'], $_POST['quantidade'], $_POST['preco'], $_POST['categoria'], $_POST['validade']);
}
?>

<form method="post">
    Medicamento: <input type="text" name="medicamento"><br>
    Quantidade: <input type="number" name="quantidade"><br>
    Preço: <input type="text" name="preco"><br>
    Categoria: <input type="text" name="categoria"><br>
    Data de Validade: <input type="date" name="validade"><br>
    <input type="submit" name="Enviar">
</form>