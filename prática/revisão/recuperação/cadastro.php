<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Veículo</title>
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

    form input, form select {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 300px;
    }

    button {
      padding: 10px 20px;
      background-color: #4285f4;
      color: white;
      border: none;
      cursor: pointer;
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
    <h2>Cadastro de Veículo</h2>
    <form method="post">
      <input name="modelo" placeholder="Modelo do veículo" required>
      <select name="montadora" required>
        <option disabled selected>Montadora</option>
        <option value="honda">Honda</option><option value="chevrolet">Chevrolet</option><option value="peugeot">Peugeot</option>
        <option value="volkswagen">Volkswagen</option><option value="fiat">Fiat</option><option value="toyota">Toyota</option>
        <option value="byd">BYD</option><option value="outros">Outros</option>
      </select>
      <select name="motor" required>
        <option disabled selected>Tipo de motor</option>
        <option value="1.0">1.0</option><option value="1.4">1.4</option><option value="1.6">1.6</option>
        <option value="2.0">2.0</option><option value="eletrico">Elétrico</option><option value="outros">Outros</option>
      </select>
      <select name="combustivel" required>
        <option disabled selected>Tipo de combustível</option>
        <option value="flex">Flex</option><option value="gasolina">Gasolina</option><option value="alcool">Álcool</option>
        <option value="diesel">Diesel</option><option value="eletrico">Elétrico</option>
      </select>
      <input name="lugares" type="number" placeholder="Número de lugares" required>
      <input name="litragem" type="number" placeholder="Litragem do bagageiro" required>
      <input name="preco" type="number" placeholder="Preço do veículo" required>
      <button type="submit">Cadastrar</button>
    </form>
  </main>

  <?php
    $_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]];
    if (isset($_POST["modelo"]) && isset($_POST["montadora"]) && isset($_POST["motor"]) && isset($_POST["combustivel"]) && isset($_POST["lugares"]) && isset($_POST["litragem"]) && isset($_POST["preco"])) {
      $veiculoCadastrado = [
        "modelo" => $_POST["modelo"],
        "montadora" => $_POST["montadora"],
        "motor" => $_POST["motor"],
        "combustivel" => $_POST["combustivel"],
        "lugares" => $_POST["lugares"],
        "litragem" => $_POST["litragem"],
        "preco" => $_POST["preco"]
      ];
      array_push($_SESSION["veiculos"][$_SESSION["usuarios"][0]["email"]], $veiculoCadastrado);
    }
  ?>
</body>
</html>
