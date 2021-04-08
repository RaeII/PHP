<?php
$a = [];
$b = [10, 20, 30, 40];
$v = 42;

function sumOfTwo($a, $b, $v) {
if(isset($a) && isset($b)){
  foreach($a as $valuea){
      $x = $valuea; 
      foreach($b as $valueb){
          if(is_int($x) && is_int($valueb)){
          if(($x + $valueb) === $v){
              return true;
          }
        }
      }
  }
}
  return false;
}

//or
function sumOfTwo2($a, $b, $v) {
    $b = array_flip($b);
    foreach ($a as $x)
        if ($b[$v - $x]) return true;
    return false;
}

var_dump(sumOfTwo($a, $b, $v));

?>