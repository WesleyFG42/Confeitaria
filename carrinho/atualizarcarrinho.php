<?php
include("conexao.php");

if (isset($_POST['id']) && isset($_POST['quantidade'])) {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE tb_carrinho SET quantidade = '$quantidade' WHERE id = '$id'";
    if (mysqli_query($conexao, $sql)) {
        header("Location: carrinho.php");
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}
?>
