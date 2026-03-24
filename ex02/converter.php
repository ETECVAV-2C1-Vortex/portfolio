<?php 

$temp = $_GET['temp'];
$n1 = $_GET['n1'];

?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Entre 100 e 200</title>

</head>

<body>

<h1>Taí saporra </h1>

<p>Primeiro número: <?php echo $n1; ?></p>
<?php if ($temp == "C") {
        $faren = ((9 * $n1) / 5) + 32;
        echo "<p> $n1 em Farenheit é $faren</p>";
    } elseif ($temp == "F") {
        $celsius = (5/9) * ($n1 - 32);
        echo "<p> $n1 em Celsius é $celsius</p>";
    }
    
    
    ?>
<a href="index.php">Voltar</a>

</body>

</html>