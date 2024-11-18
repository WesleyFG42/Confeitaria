<?php
session_start();
include("conexao.php"); // Inclui a conexão com o banco de dados

$query = "SELECT nome, descricao, ingredientes, categoria, valor, arquivo_foto FROM tb_docesconfeitaria"; // Consulta SQL para buscar os doces
$result = mysqli_query($conexao, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1>Lista de Doces</h1>";
    
    // Início da tabela
    echo "<table>";
    echo "<thead><tr><th>Foto</th><th>Nome</th><th>Descrição</th><th>Ingredientes</th><th>Preço</th></tr></thead>";
    echo "<tbody>";

    // Loop para exibir cada doce com suas informações
    while ($row = mysqli_fetch_assoc($result)) {
        $nome = htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8');
        $descricao = htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8');
        $valor = number_format($row['valor'], 2, ',', '.'); // Formata o valor em formato de moeda
        $ingredientes = htmlspecialchars($row['ingredientes'], ENT_QUOTES, 'UTF-8');
        $arquivo_foto = $row['arquivo_foto'] ? "fotos/" . $row['arquivo_foto'] : "fotos/padrao.jpg"; // Verifica o caminho da foto

        echo "<tr>";
        echo "<td><a href='#' class='open-modal' data-img='$arquivo_foto'><img src='$arquivo_foto' alt='$nome' style='width: 100px; height: 100px; object-fit: cover; border-radius: 10px;'></a></td>";
        echo "<td>$nome</td>";
        echo "<td>$descricao</td>";
        echo "<td>$ingredientes</td>";
        echo "<td>R$ $valor</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Nenhum doce cadastrado.</p>";
}

// Tratamento de erro em caso de falha na consulta
if (!$result) {
    echo "<p>Erro na consulta: " . mysqli_error($conexao) . "</p>";
}
?>
