<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="" href="favicon.ico" type="">
    <link rel="shortcut icon" href="icon/hnet.com-image.ico" type="image/x-icon">
    <title>MyBit</title>
    
</head>


<body>
    <h1> 
       <?php
         echo "O dolar está: ";
      
         $url ='https://www.remessaonline.com.br/cotacao/cotacao-dolar?utm_id=8906755110&matchtype=e&placement=&adgroupid=91232327898&loc_interest_ms=&loc_physical_ms=1032041&network=g&target=&adposition=&utm_source=google&utm_medium=cpc&utm_campaign=RM_Search_Desk_Cotacao_RLSA_PF&utm_term=cotação%20do%20dolar&utm_content=411611315474&gclid=EAIaIQobChMIqs-h-PyT7wIVBYiGCh3y3QJqEAAYASABEgIQdPD_BwE';
    
         $dadosSite = file_get_contents($url);
    
         $dolar1 = explode('<div class="style__Text-sc-15flwue-2 cSuXFv">',$dadosSite);
         $dolar2 = explode('</div>',$dolar1[1]);
    
          $dolar = $dolar2[0];
          $valor = null;
          
          for ($i=0; $i <=3 ; $i++) { 
            $valor .= $dolar[$i];
          }
          
          $valor[1]=".";
          echo $valor;
            
         echo "<br>";
         echo "Bitcoin está: ";
      
         $url ='https://coinlib.io/coin/BTC/Bitcoin?utm_source=foxbit.com.br&utm_medium=clwidget&utm_campaign=full_v2';
    
         $dadosSite = file_get_contents($url);
    
         $var1 = explode('<span class="price" id="coin-main-price">',$dadosSite);
         $var2 = explode('</span>',$var1[1]);
    
         $bit = $var2[0]; 
         $coin = null;

         for ($i=40; $i <46 ; $i++){ 
           if($i != 42){
           $coin.=$bit[$i];
           }      
         }
         echo $coin ;

         echo "<br>";
         echo 'Valor do Bit R$ ';

         echo $coin * $valor;
        ?>
    </h1>

    
</body>
</html>