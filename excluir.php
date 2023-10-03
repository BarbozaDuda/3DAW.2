<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    $quantExcluir = $_GET['quantidade'];
    
    $arqCar = fopen("carrinho.txt", "r") or die("Erro ao abrir o arquivo");
    $arqTemp = fopen("arqTemp.txt", "a+") or die("Erro ao criar arquivo temporário");
    
    while (!feof($arqCar)) 
    {
        $linha = fgets($arqCar);
        $colunaDados = explode(";", $linha);
        
        if (count($colunaDados) == 2 && $colunaDados[1] == $quantExcluir) 
        {
            continue; // pula linha
        } 
        else 
        {
            fwrite($arqTemp, $linha);
        }
    }
    
    fclose($arqTemp);
    fclose($arqCar);
    
    copy("arqTemp.txt", "carrinho.txt");
    unlink('arqTemp.txt');
    
    header("Location: index.php"); // volta para pagina inicial
  
    exit();
}
?>
