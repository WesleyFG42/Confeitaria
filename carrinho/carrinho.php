<?php
session_start();
include("../conexao.php"); // Inclui a conexão com o banco de dados

// Verifique se o cliente está logado
$id_cliente = isset($_SESSION['cliente_id']) ? intval($_SESSION['cliente_id']) : 0;

if ($id_cliente > 0) {
    // Corrigido: Usando o id_cliente para filtrar a consulta
    $sql = "SELECT c.id, d.nome, d.valor, c.quantidade, d.arquivo_foto
    FROM tb_carrinho c
    JOIN tb_docesconfeitaria d ON c.produto_id = d.id
    WHERE c.id_cliente = $id_cliente";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<h1>Seu Carrinho</h1>";
        echo "<table>";
        echo "<thead><tr><th>Foto</th><th>Nome</th><th>Preço</th><th>Quantidade</th><th>Total</th></tr></thead>";
        echo "<tbody>";

        $totalCarrinho = 0;

        while ($item = mysqli_fetch_assoc($resultado)) {
            $subtotal = $item['valor'] * $item['quantidade'];
            $totalCarrinho += $subtotal;

            echo "<tr>";
            echo "<td><img src='../fotos/{$item['arquivo_foto']}' alt='{$item['nome']}' style='width: 100px; height: 100px;'></td>";
            echo "<td>{$item['nome']}</td>";
            echo "<td>R$ " . number_format($item['valor'], 2, ',', '.') . "</td>";
            echo "<td>{$item['quantidade']}</td>";
            echo "<td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "<p><strong>Total: R$ " . number_format($totalCarrinho, 2, ',', '.') . "</strong></p>";
    } else {
        echo "<p>O carrinho está vazio.</p>";
    }
} else {
    echo "<p>Você precisa estar logado para ver o carrinho.</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Carrinho</title>
    <link rel="stylesheet" href="confeitaria.css">
    <script src="confeitaria.js">
         fetch("menu_secundario.html")
    </script>
</head>
<body>
    <main>
        <h1>Seu Carrinho de Compras</h1>

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
                <!-- Os dados do carrinho vão aparecer aqui -->
            </tbody>
        </table>

        <div class="total-carrinho">
            <h3>Total: R$ <span id="total">0,00</span></h3>
        </div>

        <div class="actions">
            <button onclick="window.location.href='produtos.php'">Continuar comprando</button>
            <button onclick="window.location.href='finalizar_compra.php'">Finalizar compra</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Confeitaria. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Atualiza o total do carrinho com base nas quantidades
        function atualizarTotal() {
            let total = 0;
            document.querySelectorAll('.quantidade').forEach(input => {
                const quantidade = parseInt(input.value);
                const preco = parseFloat(input.closest('tr').querySelectorAll('td')[2].textContent.replace('R$ ', '').replace(',', '.'));
                total += quantidade * preco;
            });
            document.getElementById('total').textContent = total.toFixed(2).replace('.', ',');
        }

        // Chama a função sempre que a quantidade for alterada
        document.querySelectorAll('.quantidade').forEach(input => {
            input.addEventListener('change', atualizarTotal);
        });

        // Chama a função para inicializar o total
        atualizarTotal();
    </script>
</body>
</html>
