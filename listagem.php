<?php

$host = 'localhost'; 
$username = 'root'; 
$password = 'breno';
$database = 'farmacia'; 

$conexao = new mysqli($host, $username, $password, $database);


if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}


$sql = "SELECT * FROM medicamentos ORDER BY id_medicamento DESC";
$result = $conexao->query($sql);

$medicamentos = [];

if ($result && $result->num_rows > 0) {
   
    $medicamentos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Nenhum medicamento encontrado.";
}


$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Medicamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Listagem de Medicamentos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Medicamento</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Validade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($medicamentos as $medicamento) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($medicamento['id_medicamento']) . "</td>";
                    echo "<td>" . htmlspecialchars($medicamento['medicamento']) . "</td>";
                    echo "<td>" . htmlspecialchars($medicamento['quantidade']) . "</td>";
                    echo "<td>" . htmlspecialchars($medicamento['preco']) . "</td>";
                    echo "<td>" . htmlspecialchars($medicamento['categoria']) . "</td>";
                    echo "<td>" . htmlspecialchars($medicamento['validade']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Medicamentos</title>
</head>
<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Medicamento</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Validade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($medicamentos as $medicamento) {
                    echo "<tr>";
                    echo "<td>" . $medicamento['id_medicamento'] . "</td>";
                    echo "<td>" . $medicamento['medicamento'] . "</td>";
                    echo "<td>" . $medicamento['quantidade'] . "</td>";
                    echo "<td>" . $medicamento['preco'] . "</td>";
                    echo "<td>" . $medicamento['categoria'] . "</td>";
                    echo "<td>" . $medicamento['validade'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
