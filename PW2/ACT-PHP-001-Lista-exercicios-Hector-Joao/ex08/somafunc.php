<?php 


$n = $_GET['n'];

$i;



?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Soma com Função</title>

</head>

<body>

<h1>Resultado: </h1>


<?php 




function soma($n){

        $vl=0;    
        for ( $i=0 ; $i<=$n ; $i++ ){ 
                $vl = $vl + $i;
            }


            return $vl;

}


echo soma($n);


?>

<a href="index.php">Voltar</a>

</body>

</html>