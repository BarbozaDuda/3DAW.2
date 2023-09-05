TV//função php para incluir a disciplina
<?php
function incluirDisciplina($nome, $sigla, $carga) {
    // Abre o arquivo para adicionar a nova disciplina
    $arqDisc = fopen("disciplinas.txt", "a") or die("Erro ao criar arquivo");

    // Formata os dados da disciplina
    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";

    // Escreve a linha no arquivo e fecha
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
    
    incluirDisciplina($nome, $sigla, $carga);
    $msg = "Disciplina adicionada com sucesso!";
}
?>
//html
<!DOCTYPE html>
<html>
<head>
    <title>Atividade 2</title>
</head>
<body>
  //incluindo disciplina no arquivo
    <h1>Adicionar Disciplina</h1>
    <form action="index.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        Sigla: <input type="text" name="sigla">
        <br><br>
        Carga Horária: <input type="text" name="carga">
        <br><br>
        <input type="submit" value="Adicionar Disciplina">
    </form>
    <p><?php echo $msg; ?></p>

//alterando a disciplina
  <h1>Alterar Disciplina</h1>
    <form action="alterar.php" method="POST">
        Sigla da Disciplina a ser Alterada: <input type="text" name="sigla">
        <br><br>
        Novo Nome: <input type="text" name="novaNome">
        <br><br>
        Nova Sigla: <input type="text" name="novaSigla">
        <br><br>
        Nova Carga Horária: <input type="text" name="novaCarga">
        <br><br>
        <input type="submit" value="Alterar Disciplina">
    </form>
    <p><?php echo $msg; ?></p>

//listando disciplinas
 <h1>Listar Disciplinas</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Carga Horária</th>
        </tr>
        <?php
        // Função para listar as disciplinas
        function listarDisciplinas() {
            $arqDisc = fopen("disciplinas.txt", "r") or die("Erro ao abrir arquivo");

            while (!feof($arqDisc)) {
                $linha = fgets($arqDisc);
                $colunaDados = explode(";", $linha);

                if (count($colunaDados) == 3) {
                    $nome = $colunaDados[0];
                    $sigla = $colunaDados[1];
                    $carga = $colunaDados[2];

                    echo "<tr>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $sigla . "</td>";
                    echo "<td>" . $carga . "</td>";
                    echo "</tr>";
                }
            }

            fclose($arqDisc);
        }

        // Chama a função para listar as disciplinas
        listarDisciplinas();
        ?>
    </table>
    <br>
    <a href="seuarquivo_adicionar.php">Adicionar Disciplina</a><br>
    <a href="seuarquivo_alterar.php">Alterar Disciplina</a>
</body>
</html>
