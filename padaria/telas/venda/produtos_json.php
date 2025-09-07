<?php
    require_once("../../service/produto.service.php");
    header('Content-Type: application/json');
    echo json_encode(listarProdutos(""));
?>