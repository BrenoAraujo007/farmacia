<?php
$pdo = new PDO("mysql:host=localhost;dbname=farmacia", "root", "cimatec");

if(isset($_POST['nome'])){
    $sql=$pdo->prepaare("INSERT INTO medicamentos values(?,?,?)");
    $sql->execute(array($_POST['medicamentos'],$_POST['quantidade'],$_POST['preco'],$_POST['categoria'],));
    echo 'Adicionado com sucesso';
}

?>

<form method ="post">
    
    Medicamento:<input type="text" name= "medicamento"><br>
   Quantidade:<input type="number" name= "quantidade"><br>
   preco:<input type="float" name= "preco"><br>
   categoria:<input type="text" name= "categoria"><br>
   <input type="submit" name= "Enviar">
</form>