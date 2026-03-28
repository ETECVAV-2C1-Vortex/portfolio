<?php 

$n1 = $_GET['n1'];

//ponto de partida dos numeros somados
$t1 = 0;
$t2 = 1;

//resultado atual
$rs = 0;

?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Série de Fibonacci</title>

</head>

<body>

<h1>Série de Fibonacci (GET)</h1>



<?php 

while($n1 > 0){

        echo " $t1 ";
        
        $rs = $t1 + $t2;

        $t1 = $t2;
        $t2 = $rs;


        $n1 = $n1 - 1; //contador
}

?>


<a href="index.php">Voltar</a>

</body>

</html>