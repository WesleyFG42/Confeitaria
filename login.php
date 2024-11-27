<?php
session_start();
include("conexao.php");

if (isset($_POST['cpf']) && isset($_POST['senha'])) {
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    if (empty($cpf) || empty($senha)) {
        $_SESSION['msg'] = "<p>Preencha todos os campos.</p>";
        header("Location: Principal.html");
        exit;
    }

    // Usar CPF como identificador único
    $sql = "SELECT cpf, nome, senha FROM tb_clientesconfeitaria WHERE cpf = '$cpf' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Armazena o CPF e outros dados na sessão
        $_SESSION['cliente_id'] = $usuario['cpf'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: Principal.html");
        exit;
    } else {
        $_SESSION['msg'] = "<p>CPF ou senha incorretos.</p>";
        header("Location: erro.html");
        exit;
    }
} else {
    $_SESSION['msg'] = "<p>Acesso inválido.</p>";
    header("Location: erro.html");
    exit;
}
?>
