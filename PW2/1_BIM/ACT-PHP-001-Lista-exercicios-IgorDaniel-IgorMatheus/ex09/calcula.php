<?php

$n1 = (float)$_GET["n1"];
$n2 = (float)$_GET["n2"];
$n3 = (float)$_GET["n3"];
$numeros = [$n1, $n2, $n3];
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Média Aritmética</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Média Aritmética</h1>

<?php 

function media($v){
    $media = array_sum($v) / count($v);
    return $media;
}

echo "a média dos números é:" . media($numeros);
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>