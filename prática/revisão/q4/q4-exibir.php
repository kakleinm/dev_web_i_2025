<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Geração de Tabela</title>
  <style>
    table {
      border: 1px solid black;
      text-align: center;
    }

    td {
      padding-left: 5px;
      padding-right: 5px;
    }

    th {
      padding-left: 9.5px;
      padding-right: 9.5px;
    }
  </style>
</head>
<body>
  <?php
    $linhas = $_POST["li"];
    $colunas = $_POST["col"];
    echo "<table>";
    for ($i = 0; $i <= $linhas; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= $colunas; $j++) {
        if ($i == 0) {
          echo "<th>C" . $j . "</th>";
        }
        else echo "<td> C" . $j . "L" . $i . "</td>";
      }
      echo "</tr>";
    }
    echo "</table><br>";
    $_SESSION["li"] = $linhas;
    $_SESSION["col"] = $colunas;
  ?>
</body>
</html>