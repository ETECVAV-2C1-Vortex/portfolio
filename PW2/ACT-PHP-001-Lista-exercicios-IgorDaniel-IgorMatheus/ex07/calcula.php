<?php

$n1 = (int)$_GET["n1"];
$n2 = (int)$_GET["n2"];
$n3 = (int)$_GET["n3"];
$n4 = (int)$_GET["n4"];
$n5 = (int)$_GET["n5"];
$n6 = (int)$_GET["n6"];
$n7 = (int)$_GET["n7"];
$n8 = (int)$_GET["n8"];
$arr1 = [$n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8];
$arrP = [];
$arrN = [];
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Positivos e Negativos</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Números verificados - Positivos e Negativos</h1>

<?php 
for ($i = 0; $i < 8; $i++) {

    if ($arr1[$i] == 0) {
        echo "0 não é positivo nem negativo";
    }

    else if ($arr1[$i] > 0) {
        array_push($arrP, $arr1[$i]);
    }
    
    else {
        array_push($arrN, $arr1[$i]);
    }
}
echo "NÚMEROS POSITIVOS:";
for ($i = 0; $i < count($arrP); $i++) {
    echo $arrP[$i] . "   "; 
}
echo"<br>";
echo "NÚMEROS NEGATIVOS:";
for ($i = 0; $i < count($arrN); $i++) {
    echo $arrN[$i] . "   ";
}
?>
<br>    
<a href="index.php"><button>Voltar</button></a>

</body>

</html>