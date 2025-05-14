<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Veículos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #4285f4;
      font-weight: bold;
    }

    nav a:hover {
      color: #357ae8;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 32px;
      height: 32px;
      background-color: #4285f4;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    main {
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <a href="cadastro.html">Cadastro</a>
      <a href="listagem.html">Listagem</a>
    </nav>
    <h2>Locadora</h2>
    <div class="user-info">
      <span>
        <?php
          if (isset($_SESSION["usuarios"])) {
            echo $_SESSION["usuarios"][0]["nome"] . " (" . $_SESSION["usuarios"][0]["email"] . ")";
          }
        ?>
      </span>
      <div class="user-avatar">J</div>
    </div>
  </header>

  <main>
    <h2>Veículos Cadastrados</h2>
    <table>
      <thead>
        <tr>
          <th>Modelo</th>
          <th>Montadora</th>
          <th>Combustível</th>
          <th>Valor (R$)</th>
          <th>Imposto (R$)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Siena</td>
          <td>Fiat</td>
          <td>Flex</td>
          <td>65.000,00</td>
          <td>19.500,00</td>
        </tr>
        <?php
          if (isset($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]])) {
            for ($i = 0; $i < count($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]]); $i++) {
              if ($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] <= 100000) {
                switch($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["combustivel"]) {
                  case "diesel" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.20; break;
                  case "eletrico" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.25; break;
                  case "outros" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.30; break;
                  default : $imposto = 0; break;
                }
              }
              else if ($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] > 100000 && $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] <= 200000) {
                switch($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["combustivel"]) {
                  case "diesel" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.25; break;
                  case "eletrico" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.30; break;
                  case "outros" : $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.35; break;
                  default : $imposto = 0; break;
                }
              }
              else if ($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] > 200000) {
                $imposto = $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"] * 0.40;
              }
              echo "<tr>";
              for ($j = 1; $j <= 5; $j++) {
                echo "<td>";
                switch($j) {
                  case 1 : echo $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["modelo"]; break;
                  case 2 : echo $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["montadora"]; break;
                  case 3 : echo $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["combustivel"]; break;
                  case 4 : echo $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]][$i]["preco"]; break;
                  case 5 : echo $imposto; break;
                }
                echo "</td>";
              }
              echo "</tr>";
            }
          }
        ?>
      </tbody>
    </table>
  </main>
</body>
</html>
