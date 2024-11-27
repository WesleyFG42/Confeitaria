<?php
session_start();
include("conexao.php");

$sql = "SELECT id, nome, descricao, valor, arquivo_foto FROM tb_docesconfeitaria";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($doce = mysqli_fetch_assoc($resultado)) {
        echo "<div class='doce-item'>";
        echo "<h2>{$doce['nome']}</h2>";
        echo "<p>{$doce['descricao']}</p>";
        echo "<p>Preço: R$" . number_format($doce['valor'], 2, ',', '.') . "</p>";
        echo "<img src='fotos/{$doce['arquivo_foto']}' alt='{$doce['nome']}' />";
        echo "<button class='btn-adicionar' data-id='{$doce['id']}'>Adicionar ao Carrinho</button>";
        echo "</div>";
    }
} else {
    echo "<p>Não há doces cadastrados.</p>";
}
?>

<script>
    // Função JavaScript para adicionar ao carrinho
    document.querySelectorAll('.btn-adicionar').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            fetch('adicionar_carrinho.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Produto adicionado ao carrinho!');
                } else {
                    alert(data.message || 'Erro ao adicionar ao carrinho.');
                }
            })
            .catch(error => console.error('Erro:', error));
        });
    });
</script>
