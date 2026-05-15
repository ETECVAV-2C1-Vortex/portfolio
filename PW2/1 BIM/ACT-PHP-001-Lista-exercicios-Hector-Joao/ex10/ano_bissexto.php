

<?php
$ano = $_GET["ano"];


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ano Bissexto</title>
</head>
<body>

<h1>Resultado <h1>
 
 
 
 <?php

if ($ano !=null){
    if ($ano % 400 == 0000 || ($ano % 4 == 0 && $ano % 100 != 0)){
        echo "<p>  $ano é bissexto </p>";
    }
    else {
        echo "<p>  $ano não é bissexto </p>";
    }
}





?>
</body>
</html>