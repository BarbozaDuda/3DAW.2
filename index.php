<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CARINHO</title>
</head>
<body>
  <!--tabela-->
    <h1>Lista de Produtos:</h1>
  <table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Valor</th>
  </tr>
    
  <tr>
    <td>21</td>
    <td>Shampoo 250 Ml</td>
    <td>R$22,99</td>
  </tr>
    
  <tr>
    <td>22</td>
    <td> Condicionador 250 Ml</td>
    <td>R$23,99</td>
  </tr>

    <tr>
    <td>23</td>
    <td>  Máscara de Hidratar 250 Ml</td>
    <td>R$25,99</td>
  </tr>

    <tr>
    <td>24</td>
    <td>Creme de Pentear 250 Ml</td>
    <td>R$22,99</td>
  </tr>

    <tr>
    <td>25</td>
    <td>Óleo reparador 100 Ml</td>
    <td>R$15,00</td>
  </tr>
    
</table>
<br> <br>
    <!-- formulario -->
    <!--caso o cliente deseje buscar o produto pelo nome-->
  
    <form action="buscar.php" method="GET">
      
        <label for="buscar">Nome Produto:</label>
        <input type="text" id="idbusca" name="buscar" required>
        <input type="submit" value="Buscar">
    </form>
  
<br><br>
  
  <!-- PHP -->
    <?php
    // ler o arquivo e imprimir o carrinho de compras
    $arqCar = fopen("carrinho.txt", "r") or die("Erro ao abrir o arquivo");

    echo "Carrinho de compras:";

    while (!feof($arqCar)) 
    {
        $linha = fgets($arqCar);
        $colunaDados = explode(";", $linha);
        
        if (count($colunaDados) == 3) 
        {
            $nome = $colunaDados[0];
            $quantidade = $colunaDados[1];
            $valor =$colunaDados[2];

echo "<p>{$nome} - Quantidade: {$quantidade} - Valor: {$valor} | <a href='edit.php?quantidade={$quantidade}'>Editar</a> | <a href='excluir.php?quantidade={$quantidade}'>Excluir</a></p>";
        }
    }
    
    fclose($arqCar);
    ?>
    <br><br>
  
    <p><a href="criar.php">Adicionar Produto</a></p>
  
</body>
</html>
