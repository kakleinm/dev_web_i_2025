<?php
    require_once("../../model/venda.class.php");

    function pegaVendaPeloId($id) {
        return Venda::pegaPorId($id);
    }

    function cadastrarVenda($cliente, $vendedor, $produtosVendidos, $valorTotal) {
        $venda = new Venda(null, $cliente, $vendedor, $produtosVendidos, $valorTotal);
        $venda->cadastrar();
    }

    function alterarVenda($id, $novoCliente, $novoVendedor, $novosProdutosVendidos, $novoValorTotal) {
        $venda = Venda::pegaPorId($id);
        if ($venda) {
            $venda->cliente = $novoCliente;
            $venda->vendedor = $novoVendedor;
            $venda->produtosVendidos = $novosProdutosVendidos;
            $venda->valorTotal = $novoValorTotal;
            $venda->alterar();
        }
    }

    function removerVenda($id) {
        $venda = Venda::pegaPorId($id);
        if ($venda) {
            $venda->remover();
        }
    }

    function listarVendas($filtroNome) {
        $vendas = Venda::listar($filtroNome);
        echo "<table><thead><tr><th>Cliente</th><th>Vendedor</th><th>Produtos</th><th>Valor Total</th>";
        echo "<th>Ações</th>";//NOVA LINHA
        echo "</tr></thead><tbody>";
        foreach($vendas as $venda) {
            echo "<tr><td>".$venda->cliente."</td>";
            echo "<td>".$venda->vendedor."</td>";
            $produtosNomes = [];
            foreach ($venda->produtosVendidos as $produto) {
                if ($produto && property_exists($produto, 'nome')) {
                    $produtosNomes[] = $produto->nome;
                }
            }
            echo "<td>".implode(', ', $produtosNomes)."</td>";
            echo "<td>".$venda->valorTotal."</td>";
            echo "<td><a href='http://localhost:81/padaria/telas/venda/cadastro_venda.php?acao=alterar&id=".$venda->id."'>Alterar</a> | <a href='http://localhost:81/padaria/telas/venda/executa_acao_venda.php?acao=remover&id=". $venda->id. "'>Remover</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    function calcularTotal($arrayProdutos) {
        $total = 0;
        if(is_array($arrayProdutos)) {
            foreach($arrayProdutos as $produtoId) {
            $produto = Produto::pegaPorId($produtoId);
            if ($produto) {
                    $total += $produto->preco;
                }
            }
        }
        return $total;
    }
?>