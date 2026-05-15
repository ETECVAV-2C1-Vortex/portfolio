<?php 
require_once "config/conexao.php";

$sql = "SELECT * FROM Produtos ORDER BY nome ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($produtos) {
    foreach ($produtos as $registro) {
        echo "-----------------------------------<br>";
        echo "ID: " . $registro['id'] . " | ";
        echo "Nome: " . $registro['nome'] . " | ";
        echo "Fabricante:" . $registro['fabricante'] . "<br>";
        echo "Estoque:" . $registro['estoque'] . "<br>";
        echo "Preco:" . $registro['preco'] . "<br>";
        echo "-----------------------------------<br>";
    }
} else {
    echo "A agenda está vazia.";
}




?>