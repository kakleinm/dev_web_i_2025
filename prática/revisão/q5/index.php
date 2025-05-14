<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários - Empresa</title>
</head>
<body>
    <h1>Cadastro de Funcionários</h1>
    <form action="" method="post">
        <label>Nome: </label><input type="text" name="nome" required><br>
        <label>Email: </label><input type="email" name="email" required><br>
        <label>DDD: </label><input type="number" name="ddd" required>
        <label>Telefone: </label><input type="number" name="tel" required><br>
        <select name="setor" required>
            <option disabled selected>Setor</option>
            <option value="vendas">Vendas</option>
            <option value="financeiro">Financeiro</option>
            <option value="ti">TI</option>
            <option value="rh">Recursos Humanos</option>
            <option value="almofarixado">Almofarixado</option>
        </select>
        <button>Enviar</button>
    </form>
    <?php
        $_SESSION["funcionarios"];
        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["ddd"]) && isset($_POST["tel"]) && isset($_POST["setor"])) {
            $funcionario = [
            "nome" => $_POST["nome"],
            "email" => $_POST["email"],
            "ddd" => $_POST["ddd"],
            "tel" => $_POST["tel"],
            "setor" => $_POST["setor"]
            ];
            array_push($_SESSION["funcionarios"], $funcionario);
            var_dump($_SESSION["funcionarios"]);
        }
    ?>
</body>
</html>