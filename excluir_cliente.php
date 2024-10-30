<?php 
include("conexao.php");

if (isset($_GET['cpf'])) {
    $cpf = $_GET ['cpf'];


$sqlExcluir = "delete from tb_clientesconfeitaria where cpf = '$cpf' ";
if (mysqliquery($conexao, $sqlExcluir)){
    echo "Excluido com sucesso";
}else{
    echo "Não excluido";
    }
}

?>