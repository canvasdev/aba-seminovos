<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <style>
          .car{position: relative; float: left; margin: 2.5px 5px; width: 49%; background-color: #666; color: #fff}
          html{background-color: #ccc;}
        </style>
    </head>
    <body>
<?php
  $tokenAcesso = '23a092b87f9db1073bd49af66e696891';
  $cod_empresa = '3';

  $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_CUSTOMREQUEST => "GET",  
        CURLOPT_URL => 'http://www.grupojorlan.com.br/webservice/seminovos/v1/'.$cod_empresa,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
          'Authorization: '.$tokenAcesso,
          'Content-Type: application/json'
        )
  ));

    $response = curl_exec($ch);

    if($response === FALSE){
        die(curl_error($ch));
    }

// $carros = file_get_contents("seminovos.json");
$carros = $response;
$json = json_decode($carros, true);
// var_dump($JSON);

// echo '<pre>';
// print_r($json);
// exit;

foreach($json['Seminovos'] as $item) {
    echo '<div class="car">';
    echo 'Controle: ' . $item[0]["modelo"] . '<br/>';
    echo 'Valor: ' . $item[0]["valor"] . '<br/>';
    echo 'Ano: ' . $item[0]["ano"] . '<br/>';
    echo 'Linha: ' . $item[0]["linha"] . '<br/>';
    echo 'Cor: ' . $item[0]["cor"] . '<br/>';
    echo 'Placa: ' . $item[0]["placa"] . '<br/>';
    echo 'cod_empresa: ' . $item[0]["cod_empresa"] . '<br/>';
    echo '</div>';
}



?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
