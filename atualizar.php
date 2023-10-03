<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $novaQuant = $_POST["quantidade"];
    $novoNome = $_POST["nome"];
    $nonoValor = $_POST["valor"];
  
    $arqCar = fopen("carrinho.txt", "r") or die("Erro ao abrir o arquivo");
    $arqTemp = fopen("arqTemp.txt", "a+") or die("Erro ao criar arquivo temporário");
    
    while (!feof($arqCar)) 
    {
        $linha = fgets($arqCar);
        $colunaDados = explode(";", $linha);
        
  if (count($colunaDados) == 3 && $colunaDados[1] == $novaQuant) 
  {
            $sLinha = "{$novoNome};{$novaQuant};{$novoValor}" . PHP_EOL;
            fwrite($arqTemp, $sLinha);
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
    
    header("Location: index.php"); // volta para a pagina inicial
    exit();
}
?>
