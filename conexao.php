<?php
function getPDO() {
    $host = 'localhost';
    $dbname = 'farmacia';
    $username = 'root';
    $password = 'cimatec';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}

$conn = getPDO();
?>
