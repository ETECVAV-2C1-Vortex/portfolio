<?php

$n1 = $_GET["n1"];

$n2 = $_GET["n2"];

$n3 = $_GET["n3"];

$n4 = $_GET["n4"];

$n5 = $_GET["n5"];

$rn1 = 1;

$rn2 = 1;

$rn3 = 1;

$rn4 = 1;

$rn5 = 1;

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">

<title>Soma de Fatoriais</title>

</head>

<body>

<h1>Resultado da Soma</h1>

<?php 
for ($i=1; $i <= $n1; $i++) {
    $rn1 = $rn1 * $i;
}
    echo"o fatorial do primeiro número é $rn1 <br>";

for ($i=1; $i <= $n2; $i++) {
    $rn2 = $rn2 * $i;
}
    echo"o fatorial do segundo número é $rn2 <br>" ;
for ($i=1; $i <= $n3; $i++) {
    $rn3 = $rn3 * $i;
}
    echo"o fatorial do terceiro número é $rn3 <br>";

for ($i=1; $i <= $n4; $i++) {
    $rn4 = $rn4 * $i;
}
    echo"o fatorial do quarto número é $rn4 <br>";

for ($i=1; $i <= $n5; $i++) {
    $rn5 = $rn5 * $i;
}
    echo"o fatorial do quinto número é $rn5 <br>";

    echo"a soma dos 5 fatoriais é ".($rn1+$rn2+$rn3+$rn4+$rn5)
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>