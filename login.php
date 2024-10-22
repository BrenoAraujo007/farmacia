<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// conexao.php
try {
    $conn = new PDO("mysql:host=localhost;dbname=farmacia", "root", "breno"); // Altere 'usuario' e 'senha'
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit();
}

// Início da sessão
session_start();

// Formulário de login
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login de Admin</title>
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Login">
    </form>

<?php
// Lógica de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Credenciais pré-definidas
    $usuario_predefinido = "teste";
    $senha_predefinida = "teste";

    // Verifica se as credenciais estão corretas
    if ($usuario === $usuario_predefinido && $senha === $senha_predefinida) {
        $_SESSION['usuario_id'] = $usuario_predefinido; // Armazena o usuário na sessão
        header("Location: admin.php"); // Redireciona para admin.php
        exit();
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>
</body>
</html>
