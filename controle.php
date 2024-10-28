<?php
function venderMedicamento($pdo, $medicamento, $quantidadeVendida) {
    $sql = $pdo->prepare("SELECT quantidade FROM medicamentos WHERE medicamento = ?");
    $sql->execute([$medicamento]);
    $medicamentoData = $sql->fetch(PDO::FETCH_ASSOC);

    if ($medicamentoData['quantidade'] >= $quantidadeVendida) {
        $novaQuantidade = $medicamentoData['quantidade'] - $quantidadeVendida;
        $sql = $pdo->prepare("UPDATE medicamentos SET quantidade = ? WHERE medicamento = ?");
        $sql->execute([$novaQuantidade, $medicamento]);
        echo '<div class="alert alert-success" role="alert">Venda realizada com sucesso</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Quantidade insuficiente em estoque</div>';
    }
}

if (isset($_POST['vender'])) {
    venderMedicamento($pdo, $_POST['medicamento'], $_POST['quantidadeVendida']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Medicamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Venda de Medicamentos</h1>
        <form method="post" class="mt-4">
            <div class="form-group">
                <label for="medicamento">Medicamento:</label>
                <input type="text" class="form-control" name="medicamento" id="medicamento" required>
            </div>
            <div class="form-group">
                <label for="quantidadeVendida">Quantidade Vendida:</label>
                <input type="number" class="form-control" name="quantidadeVendida" id="quantidadeVendida" required>
            </div>
            <button type="submit" name="vender" class="btn btn-primary btn-block">Vender</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
