<?php 

$n1 = $_GET['n1'];

?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Entre 100 e 200</title>

</head>

<body>

<h1>Taí saporra (GET)</h1>

<p>Primeiro número: <?php echo $n1; ?></p>
<?php if ($n1 >= 100 && $n1 <=200) {
        echo "<p>O número $n1 está no intervalo entre 100 e 200.</p>";
    } else {
        echo "<p>O número $n1 não está no intervalo entre 100 e 200.</p>";
    }
    ?>
<a href="index.php">Voltar</a>

</body>

</html>