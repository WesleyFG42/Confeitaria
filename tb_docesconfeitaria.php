<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


// Conexão com o banco de dados
include ("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome =( $_POST['nome']);
    $descricao = ( $_POST['descricao']);
    $ingredientes = ( $_POST['ingredientes']);
    $categoria = ($_POST['categoria']);
    $valor = ($_POST['valor']);

    // Query de inserção
    $sql = "INSERT INTO tb_docesconfeitaria (nome, descricao, ingredientes, categoria, valor)
            VALUES ('$nome', '$descricao', '$ingredientes', '$categoria', '$valor')";

    // Executa a query e verifica o resultado
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['msg'] = "<p>Doce cadastrado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p>Erro ao cadastrar doce: " . mysqli_error($conexao) . "</p>";
    }

    // Redireciona de volta para o formulário com uma mensagem
    header("Location: doces_tabela.html");
    exit;
}

// Fecha a conexão
mysqli_close($conexao);
?>
