<?php

$ano = (int)$_GET["ano"];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Anos Bissextos</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<h1>Anos Bissextos</h1>

<?php 
if (($ano % 400 == 0) || ($ano % 4 == 0) && ($ano % 100 != 0)){
    echo"O ano " . $ano . " é bissexto";
}
else {
    echo"O ano " . $ano . " não é bissexto";
}
?>

<a href="index.php"><button>Voltar</button></a>

</body>

</html>