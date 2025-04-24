<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de produtos</title>
</head>
<body>
  <?php
    session_start();
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $fabricante = $_POST["fabricante"];
    if(!isset($_SESSION) || !isset($_SESSION["produtos"])) $_SESSION["produtos"] = [];
    array_push($_SESSION["produtos"], ["nome" => $nome, "categoria" => $categoria, "fabricante" => $fabricante]);
  ?>
  <a href="dados.php">Acesse a lista</a>
</body>
</html>