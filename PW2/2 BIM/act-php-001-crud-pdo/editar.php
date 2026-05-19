<?php
require_once "config/conexao.php";
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    $novoNome = $_POST['nome'];

    $novoFabricante = $_POST['fabricante'];

    $novoPreco = $_POST['preco'];

    $novoEstoque = $_POST['estoque'];

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
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // 3. EXECUTAR: Passamos o valor real para o apelido :id
    $stmt->execute([':id' => $id]);

    // 4. BUSCAR: Como o ID é único, usamos fetch() em vez de fetchAll()
    // O FETCH_ASSOC serve para que o resultado venha como um array ['campo' => 'valor']
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($produto === false) {
        header("Location: editar.php?erro=ID não encontrado");
        exit;
  }
} else {

}
?>

  <?php if (!isset($produto)): ?>
     <form action="editar.php" method="GET">
        <label>ID do produto:</label>
        <input type="number" name="id" required>
        <br><br>
        <button type="submit">Buscar</button>
     </form>
  <?php elseif (isset($produto)): ?>
     <form action="editar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

    <label>Nome do Produto:</label>
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>
    <br><br>

    <label>Fabricante:</label>
    <input type="text" name="fabricante" value="<?php echo $produto['fabricante']; ?>" required>
    <br><br>

    <label>Preço (R$):</label>
    <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>
    <br><br>

    <label>Estoque Atual:</label>
    <input type="number" name="estoque" value="<?php echo $produto['estoque']; ?>" required>
    <br><br>

    <button type="submit">Salvar</button>

</form>
  <?php endif; ?>

    <?php if (isset($_GET['erro'])): ?>
      <p><?php echo $_GET['erro']; ?></p>
  <?php endif; ?>

<?php 
require 'includes/footer.php';
?>