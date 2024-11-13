<?php
session_start();
include("conexao.php");

if (
    isset($_POST['nome']) && isset($_POST['descricao']) &&
    isset($_POST['ingredientes']) && isset($_POST['categoria']) &&
    isset($_POST['valor']) && isset($_FILES['arquivo_foto'])
) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $ingredientes = $_POST['ingredientes'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];

    if (empty($nome)) {
        echo "Por favor, preencha o nome do doce.";
        exit;
    }

    // Verifica se o arquivo foi enviado e se não houve erro
    if ($_FILES['arquivo_foto']['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($_FILES['arquivo_foto']['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(time()) . '.' . $extensao;
        $diretorio = "imagens/";

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        if (move_uploaded_file($_FILES['arquivo_foto']['tmp_name'], $diretorio . $novo_nome)) {
            $resultSqlDoces = "
                INSERT INTO tb_docesconfeitaria (nome, descricao, ingredientes, categoria, valor, arquivo_foto)
                VALUES ('$nome', '$descricao', '$ingredientes', '$categoria', '$valor', '$novo_nome')";

            $resultadoDoces = mysqli_query($conexao, $resultSqlDoces);

            if ($resultadoDoces && mysqli_insert_id($conexao)) {
                $_SESSION['msg'] = "<p>Doce cadastrado com sucesso.</p>";
                header("Location: doces_menu.html");
                exit;
            } else {
                $_SESSION['msg'] = "<p>Erro ao cadastrar o doce no banco de dados.</p>";
            }
        } else {
            $_SESSION['msg'] = "<p>Erro ao mover o arquivo de foto.</p>";
        }
    } else {
        $_SESSION['msg'] = "<p>Nenhuma foto enviada ou erro no upload.</p>";
    }
} else {
    $_SESSION['msg'] = "<p>Erro: Todos os campos são obrigatórios.</p>";
}

header("Location: doces_menu.html");
exit;
?>
