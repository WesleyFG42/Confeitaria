<?php
session_start();
include("../conexao.php"); // Inclua a conexão com o banco de dados

// Verificar se o cliente está logado
if (!isset($_SESSION['cliente_id'])) {
    header("Location: ../login.php"); // Redireciona para o login
    exit;
}

$id_cliente = $_SESSION['cliente_id'];

// Consultar itens do carrinho para o cliente logado
$sql = "SELECT c.id, d.nome, d.valor, c.quantidade, d.arquivo_foto 
        FROM tb_carrinho c 
        JOIN tb_docesconfeitaria d ON c.id_produto = d.id 
        WHERE c.id_cliente = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$result = $stmt->get_result();
$itens_carrinho = $result->fetch_all(MYSQLI_ASSOC);

// Calcular o total do carrinho
$total_carrinho = 0;
foreach ($itens_carrinho as $item) {
    $total_carrinho += $item['valor'] * $item['quantidade'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Carrinho</title>
    <link rel="stylesheet" href="../confeitaria.css">
    <script src="../confeitaria.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="../produtos.php">Nossas Receitas</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Seu Carrinho de Compras</h1>

        <?php if (!empty($itens_carrinho)): ?>
            <table class="carrinho-table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens_carrinho as $item): ?>
                        <tr>
                            <td>
                                <img src="../fotos/<?= htmlspecialchars($item['arquivo_foto']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>" style="width: 100px; height: 100px;">
                            </td>
                            <td><?= htmlspecialchars($item['nome']) ?></td>
                            <td>R$ <?= number_format($item['valor'], 2, ',', '.') ?></td>
                            <td><?= $item['quantidade'] ?></td>
                            <td>R$ <?= number_format($item['valor'] * $item['quantidade'], 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-carrinho">
                <h3>Total: R$ <?= number_format($total_carrinho, 2, ',', '.') ?></h3>
            </div>

            <div class="actions">
                <button onclick="window.location.href='../produtos.php'">Continuar comprando</button>
                <button onclick="window.location.href='../finalizar_compra.php'">Finalizar compra</button>
            </div>
        <?php else: ?>
            <p>O carrinho está vazio.</p>
            <button onclick="window.location.href='../produtos.php'">Voltar às compras</button>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Confeitaria. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
