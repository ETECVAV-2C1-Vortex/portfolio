<!--
Data: 06/03/2026
Autor: João G., Hector Elias
Objetivo:

Exercício 3 - Calculadora Aritmética
Faça um programa que leia dois números e um operador ("+", "-", "*" ou "/").
O programa deve mostrar o resultado da operação.
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title> Calculadora (GET)</title>
</head>
<body>

<form action="calcula.php" method="get">
    <label>Número 1:</label>
    <input type="number" name="n1" step="any" required>
    <br><br>
    <label>Número 2:</label>
    <input type="number" name="n2" step="any" required>
    <br><br>
    <label>Operador(+, -, *, / ):</label>
    <input type="char" name="op" step="any" required>
    


    <?php 
  
    
    ?>

    <input type="submit" value="Calcular">
</form>

</body>
</html>
  