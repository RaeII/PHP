<?php
//Obter o cubico do produto
function calcCubico($compr, $larg, $espe){
    $largMt = $larg / 100;
    $espeMt = $espe / 100;

    return $compr * $largMt * $espeMt;
}


//CALCULO DO VALOR CUBICO EM ENTRADA DE VALOR POR PEÇA
function valorCubicoPeca($cubico, $custo){
    return (1 / $cubico) * $custo;
}


//CALCULO DO VALOR CUBICO EM ENTRADA DE VALOR POR MT²
function valorCubicoMt($compr, $larg, $espe, $custo){
    $largMt = $larg / 100;
    $espeMt = $espe / 100;

    $pc = $compr * $largMt * $custo;

    $cubico = $compr * $largMt * $espeMt;

    return (1 / $cubico) * $pc;
}

function lucroPorcentagem($lucro){
    return 1 + ($lucro/100);
}
