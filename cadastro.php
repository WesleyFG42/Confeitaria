<?php
include("conexao.php");
session_start();

// Entrada de dados vindos do HTML
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$data_nascimento = isset($_POST['datanascimento']) ? $_POST['datanascimento'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$numeroCasa = isset($_POST['numeroCasa']) ? $_POST['numeroCasa'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$confirmarSenha = isset($_POST['confirmarSenha']) ? $_POST['confirmarSenha'] : '';

// Verifica se algum dado não foi informado
if (
    empty($cpf) ||
    empty($celular) || 
    empty($nome) || 
    empty($email) || 
    empty($datanascimento) || 
    empty($cidade) || 
    empty($endereco) || 
    empty($numeroCasa) || 
    empty($senha) || 
    empty($confirmarSenha)
) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

// Inserção no banco de dados
$resultSqlCliente = "INSERT INTO tb_clientesconfeitaria (cpf, nome, celular, datanascimento, email, cidade, endereco, nrcasa, senha, confirmarsenha)
VALUES ('$cpf', '$nome', '$celular', '$datanascimento', '$email', '$cidade', '$endereco', '$numeroCasa', '$senha', '$confirmarSenha')";

$resultadoCliente = mysqli_query($conexao, $resultSqlCliente);

if ($resultadoCliente) {
    $_SESSION['msg'] = "<p>Cliente cadastrado com sucesso!</p>";
} else {
    $_SESSION['msg'] = "<p>Erro ao cadastrar cliente: " . mysqli_error($conexao) . "</p>";
}
?>
