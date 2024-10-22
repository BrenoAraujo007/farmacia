<?php
require 'conexao.php';

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

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<form method="post" class="form-group">
    Medicamento: <input type="text" name="medicamento" class="form-control"><br>
    Quantidade: <input type="number" name="quantidade" class="form-control"><br>
    Preço: <input type="text" name="preco" class="form-control"><br>
    Categoria: <input type="text" name="categoria" class="form-control"><br>
    Data de Validade: <input type="date" name="validade" class="form-control"><br>
    <input type="submit" name="Enviar" class="btn btn-primary">
</form>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Validade</th>
    </tr>
    
</table>