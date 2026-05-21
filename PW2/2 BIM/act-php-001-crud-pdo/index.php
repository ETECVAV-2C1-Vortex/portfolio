<?php
require 'includes/header.php';

require_once "config/conexao.php";

$sql = "SELECT * FROM Produtos ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo"<h2>Registros</h2>";


if ($produtos) {
    foreach ($produtos as $registro) {


        echo "  
          

                <div class='vsbar'>

                    <div class='idbar'>
                        <h1>ID: ". $registro['id'] ."</h1>
                    </div>


                <div class='info'>


                    <i>Produto: ". $registro['nome'] ." </i>

                    <i>Fabricante: ". $registro['fabricante'] ."</i>

                    <p>Estoque: ". $registro['estoque'] ."</p>

                    <p>Preço: ". $registro['preco'] ."</p>


                </div>

                </div>

        
        
        ";





    }
} else {
    echo "<h3>A lista está vazia.</h3>";
}
?>

<?php
require 'includes/footer.php';
?>

