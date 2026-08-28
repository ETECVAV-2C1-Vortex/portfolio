<?php

$n1 = (float)$_GET["n1"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Número entre 100 e 200</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Número verificado</h1>

<?php 
    if ($n1 >= 100 && $n1 <= 200) {
        echo "O número $n1 está entre 100 e 200";
    }
    else {
        echo "O número $n1 não está entre 100 e 200";
    }
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>