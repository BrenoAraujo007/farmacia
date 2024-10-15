<?php
function venderMedicamento($pdo, $medicamento, $quantidadeVendida) {
    $sql = $pdo->prepare("SELECT quantidade FROM medicamentos WHERE medicamento = ?");
    $sql->execute([$medicamento]);
    $medicamentoData = $sql->fetch(PDO::FETCH_ASSOC);

    if ($medicamentoData['quantidade'] >= $quantidadeVendida) {
        $novaQuantidade = $medicamentoData['quantidade'] - $quantidadeVendida;
        $sql = $pdo->prepare("UPDATE medicamentos SET quantidade = ? WHERE medicamento = ?");
        $sql->execute([$novaQuantidade, $medicamento]);
        echo 'Venda realizada com sucesso';
    } else {
        echo 'Quantidade insuficiente em estoque';
    }
}

if (isset($_POST['vender'])) {
    venderMedicamento($pdo, $_POST['medicamento'], $_POST['quantidadeVendida']);
}
?>

<form method="post">
    Medicamento: <input type="text" name="medicamento"><br>
    Quantidade Vendida: <input type="number" name="quantidadeVendida"><br>
    <input type="submit" name="vender" value="Vender">
</form>
