<?php 


$n1 = $_GET['n1'];
$n2 = $_GET['n2'];
$n3 = $_GET['n3'];
$n4 = $_GET['n4'];
$n5 = $_GET['n5'];
$n6 = $_GET['n6'];
$n7 = $_GET['n7'];
$n8 = $_GET['n8'];


$varray = array($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8 );

$vPos = array(  );
$vNeg = array(  );




?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Positivos e Negativos</title>

</head>

<body>

<h1>Resultado: </h1>

<?php 


for($i=0;$i<=7;$i++){

    if($varray[$i]>0 ){
        $vPos[$i] = $varray[$i]; 
    }else{
        $vNeg[$i] = $varray[$i]; 
    }
}




echo "<p>Números positivos:  </p>";

for($i=0;$i<=7;$i++){
    if($vPos[$i] !=0 ){

        echo "<p> $vPos[$i] <br> </p>";

    }
}

echo "<p>Números negativos:  </p>";

for($i=0;$i<=7;$i++){
    if($vNeg[$i] !=0 ){

        echo "<p> $vNeg[$i] <br> </p>";

    }
}


?>




<a href="index.php">Voltar</a>

</body>

</html>