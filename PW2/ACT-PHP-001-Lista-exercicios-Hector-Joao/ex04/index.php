<!--
Data: 06/03/2026
Autor: Joao Guilherme, Hector Elias
Objetivo: Criar um Triangulo numerico em um site php
Exercício 4 - Triangulo Numerico
Leia um número n e imprima n linhas no seguinte formato (exemplo para n = 6):
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title> Triângulo Numérico (GET)</title>
</head>
<body>

<form action="calcula.php" method="get">
    <label>Numero de linhas:</label>
    <input type="int" name="n" step="any" required>
    <br><br>
  
  
    <input type="submit" value="Formar triangulo">
</form>

</body>
</html>
  