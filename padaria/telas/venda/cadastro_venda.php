<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] == []) {
    header("Location: ../index/login.php");
    exit;
}

include("../../service/venda.service.php");
include("../../service/cliente.service.php");
include("../../service/funcionario.service.php");
include("../../service/produto.service.php");

$venda = null;
if(isset($_GET["id"])) {
    $venda = pegaVendaPeloId($_GET["id"]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Venda</title>
<link rel="stylesheet" href="../css/style.css">
<script src="cadastro_venda.js"></script>
</head>
<body>
<h1>Cadastro de Venda</h1>
<form id="formCadastroVenda" action="executa_acao_venda.php" method="post">
    <input type="hidden" name="acao" value="<?= !empty($venda) ? "alterar" : "cadastrar" ?>">
    <input type="hidden" name="id" value="<?= $venda ? $venda->id : "" ?>">

    <label>Cliente:</label>
    <select name="cliente" id="cliente" required>
        <?php
        $clientes = listarTodosClientes();
        foreach($clientes as $cliente){
            $selected = $venda && $venda->cliente->id == $cliente->id ? "selected" : "";
            echo "<option value='{$cliente->id}' {$selected}>{$cliente->nome}</option>";
        }
        ?>
    </select>

    <label>Funcionário:</label>
    <select name="funcionario" id="funcionario" required>
        <?php
        $funcionarios = listarTodosFuncionarios();
        foreach($funcionarios as $funcionario){
            $selected = $venda && $venda->vendedor->id == $funcionario->id ? "selected" : "";
            echo "<option value='{$funcionario->id}' {$selected}>{$funcionario->nome}</option>";
        }
        ?>
    </select>

    <label>Produtos:</label>
    <select name="produtos[]" id="produtos" multiple required>
        <?php
        $produtos = listarTodosProdutos();
        foreach($produtos as $produto){
            $selected = "";
            if($venda){
                foreach($venda->produtosVendidos as $p){
                    if($p->id == $produto->id) $selected = "selected";
                }
            }
            echo "<option value='{$produto->id}' {$selected}>{$produto->nome} - R$ {$produto->preco}</option>";
        }
        ?>
    </select>

    <button type="submit"><?= !empty($venda) ? "Alterar" : "Cadastrar" ?></button>
</form>
</body>
</html>
