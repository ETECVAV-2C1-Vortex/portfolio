<!--
Data: 29/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Desenvolver uma calculadora aritmética utilizando o método GET para envio de dados e a estrutura de decisão switch para o processamento das operações

Exercício 3 - Calculadora Aritmética
Faça um programa que leia dois números e um operador ("+", "-", "*" ou "/").
O programa deve mostrar o resultado da operação.
-->
<!DOCTYPE html>
<html lang="pt-br">
<head> <meta charset="UTF-8">
  <title>Calculadora Aritmética</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <h1>Calculadora Aritmética</h1>

  <form action="calcula.php" method="get">
    <label>Digite o primeiro número:</label>
    <input type="number" name="n1" step="any" required>
    <br>
    <br>
    <label>Digite o segundo número:</label>
    <input type="number" name="n2" step="any" required>
    <br>
    <br>
    <label>Digite o operador(+, -, * ou /):</label>
    <input type="text" name="operador" required>
    <input type="submit" value="Calcular">
  </form>

</body>
</html>