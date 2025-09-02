<?php
    session_start();
    if (!isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padaria Bolachinha</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Padaria Bolachinha</h1>
    <p>
        bem-vindo, <?php echo $_SESSION["login"]["nome"]; ?>!
        <a href="logout.php">Logout</a>
    </p>
    <h3>informações da padaria</h3>
    <ul>
        <li><a href="../funcionario/tabela_funcionario.php">Tabela de Funcionários</a></li>
        <li><a href="../cliente/tabela_cliente.php">Tabela de Clientes</a></li>
        <li><a href="../produtos/tabela_produtos.php">Tabela de Produtos</a></li>
        <li><a href="../venda/tabela_venda.php">Tabela de Vendas</a></li>
    </ul>
</body>
</html>