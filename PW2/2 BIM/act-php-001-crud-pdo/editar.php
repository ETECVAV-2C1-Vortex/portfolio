<?php
require_once "config/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id             = 2;
    $novoNome       = $_POST['nome'];
    $novoFabricante = $_POST['fabricante'];
    $novoPreco      = $_POST['preco'];
    $novoEstoque    = $_POST['estoque'];

    $sql = "UPDATE produtos SET nome = :novo_nome, fabricante = :novo_fabricante, 
            preco = :novo_preco, estoque = :novo_estoque WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $sucesso = $stmt->execute([
        ':novo_nome'       => $novoNome,
        ':novo_fabricante' => $novoFabricante,
        ':novo_preco'      => $novoPreco,
        ':novo_estoque'    => $novoEstoque,
        ':id'              => $id
    ]);

    if ($sucesso && $stmt->rowCount() > 0) {
        header("Location: index.php");
        exit;
    }

} else {

    $id = 2;
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $produtos = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
<h2>Editar produto</h2>

<form action="editar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $produtos['id']; ?>">

    <label>Nome do Produto:</label>
    <input type="text" name="nome" value="<?php echo $produtos['nome']; ?>" required>
    <br><br>

    <label>Fabricante:</label>
    <input type="text" name="fabricante" value="<?php echo $produtos['fabricante']; ?>" required>
    <br><br>

    <label>Preço (R$):</label>
    <input type="number" step="0.01" name="preco" value="<?php echo $produtos['preco']; ?>" required>
    <br><br>

    <label>Estoque Atual:</label>
    <input type="number" name="estoque" value="<?php echo $produtos['estoque']; ?>" required>
    <br><br>

    <button type="submit">Salvar</button>

</form>
</body>
</html> 