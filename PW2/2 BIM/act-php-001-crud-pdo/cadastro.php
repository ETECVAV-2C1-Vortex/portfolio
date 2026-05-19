
<?php
require 'includes/header.php';
?>


<h2>Cadastrar produto</h2>

<form action="cadastro.php" method="POST">


    <div class="cdbar">
    <label>Nome</label>
    
    <div class="iptbar">
    <input type="text" name="nome" required>
    </div>

  
    </div>




    <div class="cdbar">
    <label>Fabricante</label>
    
    <div class="iptbar">
    <input type="text" name="fabricante" required>
    </div>

    </div>





    <div class="cdbar">
    <label>Preço</label>
    
    <div class="iptbar">
    <input type="number" step="0.01" name="preco" required>
    </div>


    </div>





    <div class="cdbar">
    <label>Estoque</label>
    
    <div class="iptbar">
    <input type="number" name="estoque" required>
    </div>


    </div>





    <button class="svbt" type="submit">Salvar</button>

</form>

</body>
</html>
<?php

require_once "config/conexao.php";

$nome = $_POST['nome'];

$fabricante = $_POST['fabricante'];

$preco = $_POST['preco'];

$estoque = $_POST['estoque'];

$sql = "INSERT INTO produtos (nome, fabricante, preco, estoque)
        VALUES (:nome, :fabricante, :preco, :estoque)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':fabricante' => $fabricante,
    ':preco' => $preco,
    ':estoque' => $estoque
]);


?>

<?php
require 'includes/footer.php'
?>