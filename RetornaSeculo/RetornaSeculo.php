

<?php

function centuryFromYear($year) {
    $resto = $year%100;
    $seculo = $year/100;
    if($resto != 0){
        return ceil($seculo);
    }else{return $seculo;} 
}


