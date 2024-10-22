<?php
require 'conexao.php';


$sql= "SELECT*FROM usuarios order by id desc";

$result = $conexao->query ($sql);
print_r(result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nomeid_medicamento</th>
      <th scope="col">medicamento</th>
      <th scope="col">quantidade</th>
      <th scope="col">preco</th>
      <th scope="col">categoria</th>
      <th scope="col">validade</th>
      <th scope="col">...</th>
    </tr>
  </thead>
 <tbody>
    <?php
    while($user_data = mysqli_fetch_assoc($result))
    {

        echo"<tr>";
        echo"<td>".$user_data['id'].
    }
    ?>
</tbody>
</table>
    </div>
</body>
</html>