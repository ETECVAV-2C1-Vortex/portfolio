<!--
Data: 29/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Verificar se um número recebido via formulário está no intervalo entre 100 e 200

Exercício 1 - Intervalo entre 100 e 200
Faça um programa que receba um número e diga se este número está no intervalo entre 100 e 200.
-->

<!DOCTYPE html>
<html lang="pt-br">
<head> <meta charset="UTF-8">
  <title>Intervalo entre 100 e 200</title>
</head>
<body>

  <h1>Número num intervalo de 100 e 200</h1>

  <form action="calcula.php" method="get">
    <label>Digite um número para verificar se ele está entre 100 e 200:</label>
    <input type="number" name="n1" step="any" required>
    
    <input type="submit" value="Verificar">
  </form>

</body>
</html>