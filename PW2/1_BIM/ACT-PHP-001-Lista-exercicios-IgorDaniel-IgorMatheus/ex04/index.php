<!--
Data: 29/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Gerar um triângulo numérico com n linhas utilizando estruturas de repetição aninhadas em PHP, recebendo o parâmetro via método GET

Exercício 4 - Triângulo Numérico
Leia um número n e imprima n linhas no seguinte formato (exemplo para n = 6):

1
1 2
1 2 3
1 2 3 4
1 2 3 4 5
1 2 3 4 5 6
-->

<!DOCTYPE html>
<html lang="pt-br">
<head> <meta charset="UTF-8">
  <title>Triângulo Numérico</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <h1>Triângulo Númerico</h1>

  <form action="calcula.php" method="get">
    <label>Digite um número:</label>
    <input type="number" name="num" step="any" required>
    <input type="submit" value="Enviar">
  </form>

</body>
</html>