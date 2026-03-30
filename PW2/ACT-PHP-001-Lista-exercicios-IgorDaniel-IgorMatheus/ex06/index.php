<!--
Data: 26/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Ler um número n e mostrar os n primeiros termos da sequência de Fibonacci

Exercício 6 - Série de Fibonacci
Leia um número n e mostre os n primeiros termos da sequência de Fibonacci.

Exemplo:
n = 12
Resultado:
0 1 1 2 3 5 8 13 21 34 55 89
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série de Fibonacci</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
      <h1>N primeiros termos da sequência de Fibonacci</h1>

  <form action="calcula.php" method="get">
    <label>Primeiro número:</label>
    <input type="number" name="n" required>
    <input type="submit">
</form>
</body>
</html>

