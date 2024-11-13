<?php
session_start();
include("conexao.php"); // Inclui a conexão com o banco de dados

$query = "SELECT nome, descricao, ingredientes, categoria, valor, arquivo_foto FROM tb_docesconfeitaria"; // Consulta SQL para buscar os doces
$result = mysqli_query($conexao, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1>Lista de Doces</h1>";
    echo "<div style='display: flex; flex-wrap: wrap; gap: 20px;'>";

    // Loop para exibir cada doce com suas informações
    while ($row = mysqli_fetch_assoc($result)) {
        $nome = htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8');
        $descricao = htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8');
        $valor = number_format($row['valor'], 2, ',', '.'); // Formata o valor em formato de moeda
        $ingredientes= htmlspecialchars($row['ingredientes'], ENT_QUOTES, 'UTF-8');
        $arquivo_foto = $row['arquivo_foto'] ? "fotos/" . $row['arquivo_foto'] : "fotos/padrao.jpg"; // Verifica o caminho da foto

        echo "<div style='text-align: center; border: 1px solid #ccc; padding: 10px; border-radius: 10px; width: 250px;'>";
        echo "<img src='$arquivo_foto' alt='$nome' style='width: 100%; height: 150px; object-fit: cover; border-radius: 10px;'>";
        echo "<h2>$nome</h2>";
        echo "<p><strong>Descrição:</strong> $descricao</p>";
        echo "<p><strong>ingredientes:</strong> $ingredientes</p>";
        echo "<p><strong>Preço:</strong> R$ $valor</p>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<p>Nenhum doce cadastrado.</p>";
}

// Tratamento de erro em caso de falha na consulta
if (!$result) {
    echo "<p>Erro na consulta: " . mysqli_error($conexao) . "</p>";
}
?>
