<?php

    $array = ["Julia", "Guilherme", "Gabriel", "Lach", "Karen"];

    $resultado = array_filter($array, function($valor) {
        return $valor == "Julia" || $valor == "Karen";
    });
    
    var_dump($resultado);

?>