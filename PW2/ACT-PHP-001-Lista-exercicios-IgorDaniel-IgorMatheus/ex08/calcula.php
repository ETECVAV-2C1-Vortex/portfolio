<?php

$n1 = (int)$_GET["n1"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Soma de 0 até N</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Número verificado</h1>

<?php 

function soma($n){
    $soma = 0;
    if ($n>0){
        for ($i = 0;$i <= $n; $i++){
            $soma = $soma + $i;
            }
    }

    else {
        for ($i = 0;$i >= $n; $i--){
            $soma = $soma + $i;
            }
    }
    return $soma;
    
}
echo"A soma de 0 até N é igual à: <br>";
echo soma($n1);
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>