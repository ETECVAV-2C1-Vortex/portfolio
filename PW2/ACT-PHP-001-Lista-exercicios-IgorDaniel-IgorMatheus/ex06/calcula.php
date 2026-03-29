<?php
$n = (int)$_GET["n"]; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Série de Fibonacci</title>
</head>
<body>

    <h1>Resultados da Sequência</h1>


    <?php 
    $n1 = 0;
    $n2 = 1;

    echo"Os primeiros " . $n . " termos são: ";

    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            echo $n1 . " ";
        }
        
         else if ($i == 2) {
            echo $n2 . " ";
        } 
        
        else {
            $novo_num = $n1 + $n2;
            echo $novo_num . " ";
            
            $n1 = $n2;
            $n2 = $novo_num;
        }
    }
    ?>

    <br><br>
    <a href="index.php"><button>Voltar</button></a>

</body>
</html>