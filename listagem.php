<?php
require 'conexao.php';

function listarMedicamentos($pdo, $ordem = 'nome') {
    $sql = $pdo->prepare("SELECT * FROM medicamentos ORDER BY $ordem");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

$medicamentos = listarMedicamentos($pdo, isset($_GET['ordem']) ? $_GET['ordem'] : 'nome');
?>

<form method="get">
    Ordenar por:
    <select name="ordem">
        <option value="nome">Nome</option>
        <option value="preco">Preço</option>
        <option value="categoria">Categoria</option>
    </select>
    <input type="submit" value="Ordenar">
</form>

<table>
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Validade</th>
    </tr>
    <?php foreach ($medicamentos as $medicamento): ?>
    <tr>
        <td><?= $medicamento['medicamento'] ?></td>
        <td><?= $medicamento['quantidade'] ?></td>
        <td><?= $medicamento['preco'] ?></td>
        <td><?= $medicamento['categoria'] ?></td>
        <td><?= $medicamento['validade'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
