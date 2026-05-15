<?php

$servidor = "localhost";
$banco = "farmacia_db";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco",
        $usuario,
        $senha
    );

    echo "Conexão foi realizada com sucesso!";

} catch(PDOException $erro) {

    echo "Erro na conexão: " . $erro->getMessage();

}

?>