<?php

$n1 = (float)$_GET["n1"];
$n2 = (float)$_GET["n2"];
$operador = (string)$_GET["operador"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Calculadora Aritmética</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Resultado do Calculo</h1>

<?php 
switch ($operador) {
    case "+":
        echo "o resultado da soma é: " . ($n1 + $n2);
    break;
    case "-":
        echo "o resultado da subtração é: " . ($n1 - $n2);
    break;
    case "*":
        echo "o resultado da multiplicação é: " . ($n1 * $n2);
    break;
    case "/":
        if ($n2 == 0) {
            echo"ERRO: Divisão por zero é impossível";
        }
        else {
             echo"O resultado da divisão é: " . ($n1 / $n2);
        }
    break;
    default:
        echo "operador inválido!";
}
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>