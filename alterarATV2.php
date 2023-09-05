//função para alterar
<?php
function alterarDisciplina($nome, $sigla, $carga, $novaNome, $novaSigla, $novaCarga) {
    $arqDisc = fopen("disciplinas.txt", "r") or die("Erro ao abrir arquivo");

    // Abre um arquivo temporário para escrever as disciplinas alteradas
    $arqTemp = fopen("disciplinas2.txt", "w") or die("Erro ao criar arquivo temporário");

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);

        if (count($colunaDados) == 3 && trim($colunaDados[1]) == trim($sigla)) {
            // Disciplina encontrada, altera os valores
            $linha = $novaNome . ";" . $novaSigla . ";" . $novaCarga . "\n";
        }

        fwrite($arqTemp, $linha);
    }

    fclose($arqDisc);
    fclose($arqTemp);

    // Renomeia o arquivo temporário para "disciplinas.txt"
    rename("disciplinas2.txt", "disciplinas.txt");
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sigla = $_POST["sigla"];
    $novaNome = $_POST["novaNome"];
    $novaSigla = $_POST["novaSigla"];
    $novaCarga = $_POST["novaCarga"];

    alterarDisciplina("", $sigla, "", $novaNome, $novaSigla, $novaCarga);
    $msg = "Disciplina alterada com sucesso!";
}
?>
