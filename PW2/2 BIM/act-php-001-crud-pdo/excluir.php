<?php
require_once "config/conexao.php";
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // 3. EXECUTAR:
    $stmt->execute([':id' => $id]);

    // 4. VERIFICAÇÃO:
    // O rowCount nos diz se realmente alguma linha foi removida
    if ($stmt->rowCount() > 0) {
        header("Location: index.php");
        exit;
    } else {
        echo "Nenhum produto foi encontrado com o ID $id.";
}}
elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // 3. EXECUTAR: Passamos o valor real para o apelido :id
    $stmt->execute([':id' => $id]);

    // 4. BUSCAR: Como o ID é único, usamos fetch() em vez de fetchAll()
    // O FETCH_ASSOC serve para que o resultado venha como um array ['campo' => 'valor']
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($produto === false) {
        header("Location: excluir.php?erro=ID não encontrado");
        exit;
      }

      if ($produto === false) {
        header("Location: editar.php?erro=ID não encontrado");
        exit;
}} else {

}
?>

<?php if (!isset($produto)): ?>
     <form action="excluir.php" method="GET">
        <label>ID do produto:</label>
        <input type="number" name="id" required>
        <br><br>
        <button type="submit">Buscar</button>
     </form>
  <?php elseif (isset($produto)): ?>
     <form action="excluir.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>" readonly>

    <label>Nome do Produto:</label>
    <input type="text" value="<?php echo $produto['nome']; ?>" readonly>
    <br><br>

    <label>Fabricante:</label>
    <input type="text" value="<?php echo $produto['fabricante']; ?>" readonly>
    <br><br>

    <label>Preço (R$):</label>
    <input type="number" step="0.01" value="<?php echo $produto['preco']; ?>" readonly>
    <br><br>

    <label>Estoque Atual:</label>
    <input type="number" value="<?php echo $produto['estoque']; ?>" readonly>
    <br><br>

    <button type="submit">Excluir</button>

</form>
  <?php endif; ?>

  <?php if (isset($_GET['erro'])): ?>
      <p><?php echo $_GET['erro']; ?></p>
  <?php endif; ?>

<?php
require 'includes/footer.php';
?>