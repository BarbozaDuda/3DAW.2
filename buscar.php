<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{
    $termoBuscado = $_GET['buscar'];

    $arqCar = fopen("carrinho.txt", "r") or die("Erro ao abrir o arquivo");
    
    while (!feof($arqCar)) 
    {
        $linha = fgets($arqCar);
        $colunaDados = explode(";", $linha);
        
        if (count($colunaDados) == 2) 
        {
            $nome = $colunaDados[0];
            $quantidade = $colunaDados[1];
            $valor = $colunaDados[2];

  // verificar se a busca combina com nome
  if (stripos($nome, $termoBuscado) !== false || stripos($quantidade, $termoBuscado) !== false) 
  {
echo "<p>{$nome}| <a href='edit.php?quantidade={$quantidade}'>Editar</a> | <a href='delete.php?quantidade={$quantidade}'>Excluir</a></p>";
            }
        }
    }
    
    fclose($arqCar);
}
?>
