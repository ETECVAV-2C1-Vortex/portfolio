<?php
require_once "config/conexao.php";

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

    $stmt->execute([':id' => $id]);

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($produto === false) {
        header("Location: editar.php?erro=ID não encontrado");
        exit;
  }
} else {

}

require_once "includes/header.php";
?>

<?php if (!isset($produto)): ?>

    <h2>Editar Produto</h2>

    <form action="editar.php" method="GET">

      <div class="edBusca">
            <label>ID:</label>
        
                <input type="number" name="id" required>
     
        <button type="submit">Buscar</button>
        <hr>
    </div>

    </form>

<?php elseif (isset($produto)): ?>

    <h2>Editar Produto</h2>

    <form action="editar.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <div class="cdbar">
            <label>Nome</label>
            <div class="iptbar">
                <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
            </div>
        </div>

        <div class="cdbar">
            <label>Fabricante</label>
            <div class="iptbar">
                <input type="text" name="fabricante" value="<?php echo htmlspecialchars($produto['fabricante']); ?>" required>
            </div>
        </div>

        <div class="cdbar">
            <label>Preço</label>
            <div class="iptbar">
                <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>
            </div>
        </div>

        <div class="cdbar">
            <label>Estoque</label>
            <div class="iptbar">
                <input type="number" name="estoque" value="<?php echo $produto['estoque']; ?>" required>
            </div>
        </div>

        <button class="svbt" type="submit">Salvar</button>

    </form>

<?php endif; ?>

<?php if (isset($_GET['erro'])): ?>
    <p class="msg-erro"><?php echo htmlspecialchars($_GET['erro']); ?></p>
<?php endif; ?>

<?php 
require_once "includes/footer.php";
?>