<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $valor = $_POST["valor"];
  
    
    $arqCar = fopen("carrinho.txt", "a") or die("Erro ao abrir o arquivo");
    
    $sLinha = "{$nome};{$quantidade};{$valor}" . PHP_EOL;
    fwrite($arqCar, $sLinha);
    
    fclose($arqCar);
    
    header("Location: index.php"); // volta p essa pagina
    exit();
}
?>
