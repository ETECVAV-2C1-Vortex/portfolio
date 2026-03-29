<!--
Data: 26/03/2026
Autor: Igor Daniel e Igor Matheus
Objetivo: Ler um ano e informar se ele é bissexto com base nas regras de múltiplos de 4, 100 e 400

Exercício 10 - Ano Bissexto
Leia um ano e informe se ele é bissexto.

Um ano é bissexto se:

É múltiplo de 400
ou
É múltiplo de 4 e não é múltiplo de 100
-->

<!DOCTYPE html>
<html lang="pt-br">
<head> <meta charset="UTF-8">
  <title>Anos Bissextos</title>
</head>
<body>

<h1>Anos Bissextos</h1>

  <form action="calcula.php" method="get">
    <label>Digite um ano e descubra se ele é bissexto:</label>
    <input type="number" name="ano" required>
    <br>
    <br>
    <input type="submit" value="Verificar">
  </form>

</body>
</html>