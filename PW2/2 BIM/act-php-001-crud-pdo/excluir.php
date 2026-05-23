<?php
require_once "config/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() > 0) {
        header("Location: index.php");
        exit;
    } else {
        header("Location: excluir.php?erro=ID não encontrado");
        exit;
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([':id' => $id]);

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($produto === false) {
        header("Location: excluir.php?erro=ID não encontrado");
        exit;
      }

} else {

}

require_once 'includes/header.php';
?>

<?php if (!isset($produto)): ?>

    <h2>Excluir Produto</h2>

    <form action="excluir.php" method="GET">

        <div class="edBusca">
            <label>ID:</label>
           
          <input type="number" name="id" required>
            
        <button  type="submit">Buscar</button>
        <hr>
        </div>

    </form>

<?php elseif (isset($produto)): ?>

    <h2>Excluir Produto</h2>

    <form action="excluir.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <div class="cdbar">
            <label>Nome</label>
            <div class="iptbar">
                <input type="text" value="<?php echo htmlspecialchars($produto['nome']); ?>" readonly>
            </div>
        </div>

        <div class="cdbar">
            <label>Fabricante</label>
            <div class="iptbar">
                <input type="text" value="<?php echo htmlspecialchars($produto['fabricante']); ?>" readonly>
            </div>
        </div>

        <div class="cdbar">
            <label>Preço</label>
            <div class="iptbar">
                <input type="number" step="0.01" value="<?php echo $produto['preco']; ?>" readonly>
            </div>
        </div>

        <div class="cdbar">
            <label>Estoque</label>
            <div class="iptbar">
                <input type="number" value="<?php echo $produto['estoque']; ?>" readonly>
            </div>
        </div>

        <button class="dlbt" type="submit">Excluir</button>

    </form>

<?php endif; ?>

<?php if (isset($_GET['erro'])): ?>
    <p class="msg-erro"><?php echo htmlspecialchars($_GET['erro']); ?></p>
<?php endif; ?>

<?php
require_once 'includes/footer.php';
?>