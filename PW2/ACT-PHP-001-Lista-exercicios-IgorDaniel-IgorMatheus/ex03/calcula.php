<?php

$n1 = $_GET["n1"];
$n2 = $_GET["n2"];
$operador = $_GET["operador"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">

<title>Calculadora Aritmética</title>

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
        echo "o resultado da divisão é: " . ($n1 / $n2);
    break;
    default:
        echo "operador inválido!";
}
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>