<?php
    include_once("class_pai.class.php");
    include_once("cliente.class.php");
    include_once("funcionario.class.php");
    include_once("produto.class.php");
    class Venda extends ClassePai {
        public $cliente;
        public $vendedor;//tipo Funcionario
        public $produtosVendidos;
        public $valorTotal;

        function montaLinhaDados()
        {
            $idsProdutos = [];
            foreach($this->produtosVendidos as $produto) {
                if (is_object($produto) && property_exists($produto, 'id')) {
                    $idsProdutos[] = $produto->id;
                }
    
                else if (is_numeric($produto)) {
                    $idsProdutos[] = $produto;
                }
            }

            $linha =
                $this->id
                .self::SEPARADOR
                .$this->cliente
                .self::SEPARADOR
                .$this->vendedor
                .self::SEPARADOR
                .$this->valorTotal
                .self::SEPARADOR;

                foreach($idsProdutos as $idProd) {
                    $linha .= self::SEPARADOR . $idProd;
                }

            return $linha;
        }

        public function __construct($id, $cliente, $vendedor, $produtosVendidos, $valorTotal) {
            parent::__construct($id, "../../db/venda.txt");
            $this->cliente = $cliente;
            $this->vendedor = $vendedor;
            $this->produtosVendidos = $produtosVendidos;
            $this->valorTotal = $valorTotal;
        }

        static public function pegaPorId($id) {
            $arquivo = fopen("../../db/venda.txt", "r");
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                if($dados[0] == $id){
                    fclose($arquivo);
                    //PEGA OS IDS DOS PRODUTOS
                    $idsProdutos = array_slice($dados, 4);
                    return new Venda($dados[0], Cliente::pegaPorId($dados[1]), Funcionario::pegaPorId($dados[2]), Produto::pegaPorIds($idsProdutos), $dados[3]);
                }
            }
            fclose($arquivo);
        }

        static public function listar($filtroNome) {
            $arquivo = fopen("../../db/venda.txt", "r");
            $retorno = [];
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                if(str_contains($dados[1], $filtroNome)){
                    $idsProdutos = array_slice($dados, 4);
                    $produtos = Produto::pegaPorIds($idsProdutos);
                    array_push($retorno, new Venda($dados[0], $dados[1], $dados[2], $produtos, $dados[3]));
                }
                
            }
            return $retorno;
        }

        static function pegaPorIds($ids) {
            $retorno = [];
            foreach($ids as $id) {
                array_push($retorno, Produto::pegaPorId($id));
            }
            return $retorno;
        }
    }
?>