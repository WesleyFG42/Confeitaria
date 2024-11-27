<?php
include("conexao.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_carrinho WHERE id = '$id'";
    if (mysqli_query($conexao, $sql)) {
        header("Location: carrinho.php");
    } else {
        echo "Erro ao remover: " . mysqli_error($conexao);
    }
}
?>
