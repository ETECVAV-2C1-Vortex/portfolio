<?php 

$n1 = $_GET['n1'];

$n2 = $_GET['n2'];

$n3 = $_GET['n3'];

$n4 = $_GET['n4'];

$n5 = $_GET['n5'];


$i=1;

$fat1 = 1;

$fat2 = 1;

$fat3 = 1;

$fat4 = 1;

$fat5 = 1;

?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Soma Fatorial</title>

</head>

<body>

<h1>Soma dos Fatoriais (GET)</h1>



<p>números escolhidos : <?php echo $n1;
 echo $n2;
  echo $n3;
   echo $n4;
    echo $n5;

?></p>


<?php 

//calculo de fatoriais

$i=1;
while($i<=$n1){

$fat1 = $fat1*$i;

$i=$i+1;


}


$i=1;
    while($i<=$n2){

    $fat2 = $fat2*$i;

    $i=$i+1;


    }

$i=1;
        while($i<=$n3){

        $fat3 = $fat3*$i;

        $i=$i+1;


        }


$i=1;
            while($i<=$n4){

            $fat4 = $fat4*$i;

            $i=$i+1;


            }


$i=1;
                while($i<=$n5){

                $fat5 = $fat5*$i;

                $i=$i+1;


                }




$resultado = $fat1+$fat2+$fat3+$fat4+$fat5;



        echo "<p>A soma dos fatoriais é:  $fat1+$fat2+$fat3+$fat4+$fat5 = $resultado </p>";
   



?>


<a href="index.php">Voltar</a>

</body>

</html>