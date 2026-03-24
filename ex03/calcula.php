<?php 

$n1 = $_GET['n1'];

$n2 = $_GET['n2'];

$op = $_GET['op'];


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Calculadora</title>

</head>

<body>

<h1>Calculadora (GET)</h1>


<p>Primeiro número: <?php echo $n1; ?></p>

<p>Segundo número: <?php echo $n2; ?></p>

<p>Operador  <?php echo $op; ?></p>



<?php if ($op == "+") {
        echo "<p>Resultado: </p> " . $n1 + $n2;
    
    } else if ($op == "-"){
        echo "<p>Resultado: </p> " . $n1 - $n2;

    }else if ($op == "*"){
        echo "<p>Resultado: </p> " . $n1 * $n2;
    
    }else if ($op == "/"){
        echo "<p>Resultado: </p> " . $n1 / $n2;

    }
    ?>

<a href="index.php">Voltar</a>

</body>

</html>