<?php
$servidor = "localhost";
$banco = "farmacia_db";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $erro) {
    die("Erro na conexão: " . $erro->getMessage());
}
?>