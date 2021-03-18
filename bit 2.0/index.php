<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="" href="favicon.ico" type="">
  <link rel="shortcut icon" href="icon/hnet.com-image.ico" type="image/x-icon">
  <title>Bit Hoje</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
  
  <header>
    <div class="header"> Bit Hoje </div>
  </header>
  
  <div class="corpo">
    <h2>
      <?php
      include('include/include.php');

      $linkBit = 'https://coinlib.io/coin/BTC/Bitcoin?utm_source=foxbit.com.br&utm_medium=clwidget&utm_campaign=full_v2';
      $htmlBit = '<span class="price" id="coin-main-price">';

      $linkDolar = 'https://www.remessaonline.com.br/cotacao/cotacao-dolar?utm_id=8906755110&matchtype=e&placement=&adgroupid=91232327898&loc_interest_ms=&loc_physical_ms=1032041&network=g&target=&adposition=&utm_source=google&utm_medium=cpc&utm_campaign=RM_Search_Desk_Cotacao_RLSA_PF&utm_term=cotação%20do%20dolar&utm_content=411611315474&gclid=EAIaIQobChMIqs-h-PyT7wIVBYiGCh3y3QJqEAAYASABEgIQdPD_BwE';
      $htmlDolar = '<div class="style__Text-sc-15flwue-2 cSuXFv">';

      $bitCoin = bitcoin($linkBit, $htmlBit);
      $dolar = dolar($linkDolar, $htmlDolar);

      $bitReal =  $bitCoin * $dolar;

      echo "Bitcoin $" . bitcoin($linkBit, $htmlBit);
      echo "<br>";
      echo "Dolar $" . dolar($linkDolar, $htmlDolar);
      echo "<br>";
      
      echo "Bitcoin R$$bitReal";
      
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<br>";

      
      ?>
    </h2>
  </div>


</body>

</html>