
<?php
function media($v){
    $soma = 0;
    $quantidade = count($v);
    foreach ($v as $valor){
        $soma += $valor;
    }
    if ($quanidade > 0) {
        return $soma / $quantidade;
    } else {
        return 0;
    }
}
  if (isset($_GET['numeros'])){
    $entrada = $_GET['numeros'];
    $numeros = explode(",", $entrada);
    $numeros = array_map('floatval', $numeros);
    $resultado = media($numeros);
    echo "Resultado da Média: $resultado";
   } else {
        echo "Nenhum valor encontrado";
    }
  
?>

