<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Produtos</title>
</head>
<body>
  <h1>Lista de Produtos</h1>
  <?php
    session_start();
    foreach ($_SESSION["produtos"] as $key => $value) {
      echo "Produto: <b>" . $value["nome"] . "</b><br>Categoria: <em>" . $value["categoria"] . "</em><br>Fabricante: " . $value["fabricante"] . "<br><br>";
    }
  ?>
  <a href="index.html">Cadastrar produtos</a>
</body>
</html>