<?php
include("conexao.php");
session_start();

// Entrada de dados vindos do HTML
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : '';
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$arquivo_foto = isset($_POST['arquivo_foto']) ? $_POST['arquivo_foto'] : '';

// Verifica se os dados obrigatórios foram informados
if (empty($nome)) {
    echo "Por favor, preencha o nome do doce.";
    exit;
}

// Inserção no banco de dados
$resultSqlDoces = "INSERT INTO tb_docesconfeitaria (nome, descricao, ingredientes, categoria, valor, arquivo_foto)
VALUES ('$nome', '$descricao', '$ingredientes', '$categoria', '$valor', '$arquivo_foto')";

$resultadoDoces = mysqli_query($conexao, $resultSqlDoces);

if ($resultadoDoces) {
    $_SESSION['msg'] = "<p>Doce cadastrado com sucesso!</p>";
} else {
    $_SESSION['msg'] = "<p>Erro ao cadastrar doce: " . mysqli_error($conexao) . "</p>";
}
?>
