<?php 

$n = $_GET['n'];
$i = 1;
?>


<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Triangulo</title>

</head>

<body>

<h1>Triangulo </h1>

<p> número: <?php echo $n; ?></p>

<?php 

        while ($i<=$n){
        $j = 1;

            while ($j<=$i){
            echo $j , " ";
            
            $j=$j+1;
            }
        echo "<br>";
        $i=$i+1;
        }
    
    
    ?>

<a href="index.php">Voltar</a>

</body>

</html>