<!--
Data: 20/03/2026
Autor: Joao G, Hector
Objetivo: criar um site php que separe numeros positivos e negativos

Exercício 7 - Separar Positivos e Negativos
Leia 8 números inteiros e separe em dois vetores:
Um vetor com números positivos
Um vetor com números negativos
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title> Separar positivos e negativos (GET)</title>
</head>
<body>

<form action="separa.php" method="get">
  

<label>Digite os valores para separar: </label>
  
    <br><br>

    <label>Número 1 :</label>
    <input type="int" name="n1" step="any" required>
    <br><br>
  
    <label>Número 2 :</label>
    <input type="int" name="n2" step="any" required>
    <br><br>
  
    <label>Número 3 :</label>
    <input type="int" name="n3" step="any" required>
    <br><br>
  
    <label>Número 4 :</label>
    <input type="int" name="n4" step="any" required>
    <br><br>
  
    <label>Número 5 :</label>
    <input type="int" name="n5" step="any" required>
    <br><br>
  
    <label>Número 6 :</label>
    <input type="int" name="n6" step="any" required>
    <br><br>
  
    <label>Número 7 :</label>
    <input type="int" name="n7" step="any" required>
    <br><br>
  
    <label>Número 8 :</label>
    <input type="int" name="n8" step="any" required>
    <br><br>
  
 

    <input type="submit" value="Separar">
</form>

</body>
</html>
  