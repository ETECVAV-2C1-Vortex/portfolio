<?php

$num = (float)$_GET["num"];
$unidade = (string)$_GET["unidade"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Converter Unidade</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Unidade Convertida</h1>

<?php 
if ($unidade == "F" or $unidade == "f") {
    echo"$num °F em Celsius é: ". 5/9 * ($num - 32);
}
    elseif ($unidade == 'C' or $unidade == 'c') {
        echo"$num °C em Fahrenheit é: ". 9/5 * $num + 32;
    }
    else {
        echo"Unidade não reconhecida";
    }
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>