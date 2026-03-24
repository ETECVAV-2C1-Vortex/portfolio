<!--
Data: 06/03/2026
Autor: Joao
Objetivo: nao sei

Exercício 2 - Conversão de Temperatura
Faça um programa que leia um caractere "F" ou "C", indicando se o valor informado está em Fahrenheit ou Celsius.
Depois, o programa deve converter para a outra unidade.

Fórmula: C = 5/9 × (F − 32)
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title> Conversão de Temperatura</title>
</head>
<body>

<form action="calcula.php" method="get">
    <label>Unidade de Temperatura (C ou F):</label>
    <input type="string" name="temp" step="any" required>
    <br><br>
    <label>Número:</label>
    <input type="float" name="n1" step="any" required>
    <br><br>
  

    <input type="submit" value="Calcular a temperatura">
</form>

</body>
</html>
  