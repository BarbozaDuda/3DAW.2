<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
        $quantEditar = $_GET['quantidade'];
        
        $arqCar = fopen("carrinho.txt", "r") or die("Erro ao abrir o arquivo");
        
        while (!feof($arqCar)) 
        {
            $linha = fgets($arqCar);
            $colunaDados = explode(";", $linha);
            
      if (count($colunaDados) == 2 && $colunaDados[1] == $quantEditar) {
                $nome = $colunaDados[0];
                $quantidade = $colunaDados[1];
                $valor = $colunaDados[2];
              
                break;
            }
        }
        
        fclose($arqCar);
    }
    ?>
    
    <form action="atualizar.php" method="POST">
<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
        
        <input type="submit" value="Salvar Alterações">
    </form>
    
    <p><a href="index.php">Voltar para a lista de produtos</a></p>
</body>
</html>

