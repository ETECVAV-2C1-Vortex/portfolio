<?php

$num = (int)$_GET["num"];
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Triângulo Numérico</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Triângulo Numérico:</h1>

<?php 

if ($num > 0) {
for ($i = 1; $i <= $num; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
}
    else {
        echo "O número digitado é inválido!";
    }
?>

<br>
    
<a href="index.php"><button>Voltar</button></a>

</body>

</html>