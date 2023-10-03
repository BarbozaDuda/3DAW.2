<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Produtos</title>
</head>
<body>
    <h1>Selecionar Produto</h1>
    
    <form action="inserir.php" method="POST">
      
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      
        <br>
      
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>

        <br>
      
       <label for="valor">Valor:</label>
        <input type="text" id="idvalor" name="valor" required>
        <br>
      
        <input type="submit" value="Adicionar Produto">
      
    </form>
    
    <p><a href="index.php">Voltar para a lista de produtos</a></p>
</body>
</html>
