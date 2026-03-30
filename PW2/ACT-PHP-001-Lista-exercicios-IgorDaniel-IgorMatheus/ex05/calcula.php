<?php

$n1 = (int)$_POST["n1"];

$n2 = (int)$_POST["n2"];

$n3 = (int)$_POST["n3"];

$n4 = (int)$_POST["n4"];

$n5 = (int)$_POST["n5"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Soma de Fatoriais</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Resultado da Soma</h1>

<?php 
function fatorial($n){
    $fatorial = 1;

    for ($i = 1; $i <= $n; $i++){
        $fatorial = $fatorial * $i;
    }

    return $fatorial;
}

$f1 = fatorial($n1);
$f2 = fatorial($n2);
$f3 = fatorial($n3);
$f4 = fatorial($n4);
$f5 = fatorial($n5);

$soma = $f1 + $f2 + $f3 + $f4 + $f5;

    echo"a soma dos 5 fatoriais é ". $soma  
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>