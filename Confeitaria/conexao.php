<?php 

//dados para a conexão 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "tb_confeitaria";


$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>