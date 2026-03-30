<!--
Data: 29/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Converter valores de temperatura entre as escalas Celsius e Fahrenheit utilizando formulários e estruturas condicionais

Faça um programa que leia um caractere "F" ou "C", indicando se o valor informado está em Fahrenheit ou Celsius.
Depois, o programa deve converter para a outra unidade.
Fórmula: C = 5/9 × (F − 32)
-->     

<!DOCTYPE html>
<html lang="pt-br">
<head> 
  <meta charset="UTF-8">
  <title>Converter Temperatura</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <h1>Converter Celsius para Fahrenheint e Vice Versa</h1>

  <form action="calcula.php" method="get">
    <label>Digite um número para converter sua unidade:</label> 
    <input type="number" name="num" step="any" required>
    <br>
    <br>
    <label>Digite a unidade atual do número (F para Fahrenheint/C para Celsius):</label>
    <input type="text" name="unidade" required>
    
    <input type="submit" value="Verificar">
  </form>

</body>
</html>