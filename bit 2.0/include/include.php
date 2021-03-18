<?php

function bitcoin($url, $html){

    $dadoSite = file_get_contents($url);
    $var1 = explode($html, $dadoSite);
    $var2 = explode('</span>', $var1[1]);
    $bit = $var2[0];
    $coin = null;

    for ($i = 40; $i < 49; $i++) {
        if ($i != 42) {
            $coin .= $bit[$i];
        }
    }
    return $coin;
}

function dolar($url, $html){

    $dadoSite = file_get_contents($url);
    $var1 = explode($html, $dadoSite);
    $var2 = explode('</div>', $var1[1]);
    $dolar = $var2[0];
    $coin = null;

    $dolar[1] = ".";

    for ($i=0; $i <=3 ; $i++) { 
        
        $coin .= $dolar[$i]; 
    }
    return $coin;
}



?>