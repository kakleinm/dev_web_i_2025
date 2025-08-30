<?php

    $array = [
        ["nome" => "Karen", "sobrenome" => "Klein", "dataNasc" => "2009/01/09"],
        ["nome" => "Bernardo", "sobrenome" => "Lach", "dataNasc" => "2008/10/02"],
        ["nome" => "Gabriel", "sobrenome" => "Cunha", "dataNasc" => "2008/04/07"],
        ["nome" => "Bernardo", "sobrenome" => "Marques", "dataNasc" => "2009/04/06"],
        ["nome" => "Guilherme", "sobrenome" => "de Lima", "dataNasc" => "2008/06/20"],
        ["nome" => "Diogo", "sobrenome" => "Celestino", "dataNasc" => "2008/05/09"],
        ["nome" => "Julia", "sobrenome" => "Knupp", "dataNasc" => "2008/06/18"]
    ];

    function calcularIdade($date){
        $time = strtotime($date);
        if($time === false){
          return '';
        }
     
        $year_diff = '';
        $date = date('Y-m-d', $time);
        list($year,$month,$day) = explode('-',$date);
        $year_diff = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = date('d') - $day;
        if ($day_diff < 0 || $month_diff < 0) $year_diff--;
     
        return $year_diff;
    }

    $arrayNovo = array_map(function($valor) {
        $valor["nomeCompleto"] = $valor["nome"] . " " . $valor["sobrenome"];
        $valor["idade"] = calcularIdade($valor["dataNasc"]);
        return $valor;
    }, $array);

    function montarTabela($array) {
        echo "<table><tr><th>Nome Completo</th><th>Idade</th></tr>";
        foreach($array as $valor) echo "<tr><td>" . $valor["nomeCompleto"] . "</td><td>" . $valor["idade"] . "</tr>";
        echo "</table>";
    }

    montarTabela($arrayNovo);

?>