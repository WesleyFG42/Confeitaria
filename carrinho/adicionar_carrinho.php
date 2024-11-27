<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        // Busca o doce pelo ID
        $sql = "SELECT * FROM tb_docesconfeitaria WHERE id = $id LIMIT 1";
        $result = mysqli_query($conexao, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $doce = mysqli_fetch_assoc($result);

            // Verifica se já existe um carrinho para o usuário
            $id_cliente = isset($_SESSION['cliente_id']) ? $_SESSION['cliente_id'] : 1; // Substitua 1 por um ID de cliente válido

            // Inserir ou atualizar no banco de dados
            $sql_check = "SELECT * FROM tb_carrinho WHERE id_cliente = $id_cliente AND id_produto = $id";
            $result_check = mysqli_query($conexao, $sql_check);
            
            if (mysqli_num_rows($result_check) > 0) {
                // Se o produto já estiver no carrinho, atualiza a quantidade
                $sql_update = "UPDATE tb_carrinho SET quantidade = quantidade + 1 WHERE id_cliente = $id_cliente AND id_produto = $id";
                mysqli_query($conexao, $sql_update);
            } else {
                // Se o produto não estiver no carrinho, insere um novo item
                $sql_insert = "INSERT INTO tb_carrinho (id_cliente, id_produto, quantidade) VALUES ($id_cliente, $id, 1)";
                mysqli_query($conexao, $sql_insert);
            }

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Doce não encontrado']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID inválido']);
    }
}
?>
