<?php
  include("../../service/venda.service.php");
  $acao = $_POST['acao'];
  $cliente = isset($_POST['cliente'])?$_POST['cliente']:null;
  $func = isset($_POST['funcionario'])?$_POST['funcionario']:null;
  $produtos = isset($_POST['produtos'])?$_POST['produtos']:null;
  $id = isset($_POST['id'])?$_POST['id']:null;

  if($acao=="cadastrar") {
    $valorTotal = calcularTotal($produtos);
    cadastrarVenda($cliente, $func, $produtos, $valorTotal);
    echo "Cadastrado com sucesso";
  }
  else if($acao=="alterar") {
    $valorTotal = calcularTotal($produtos);
    alterarVenda($cliente, $func, $produtos, $valorTotal);
    echo "Alterado com sucesso";
  }
  else if($acao=="remover") {
    removerVenda($id);
    echo "Removido com sucesso";
  }
  else {
    echo "Ação inválida";
  }
?>