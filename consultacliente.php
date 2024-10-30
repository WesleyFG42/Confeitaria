<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cliente Confeitaria</title>
</head>
<body>
 
<h1>Consulta de Cliente por Nome</h1>
 
<form action="" method="POST">
    <label for="nome">Nome do Cliente:</label>
    <input type="text" id="nome" name="nome" >
    <input type="submit" value="Buscar">
</form>
 
</body>
</html>
 
<?php
session_start();
include("conexao.php");
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['nome'];
 
    // Consulta os dados na tabela 'tb_clientesconfeitaria' com base no nome
    $sqlConsulta = "SELECT * FROM tb_clientesconfeitaria WHERE nome LIKE '%$nome%'";
    $resultadoConsulta = mysqli_query($conexao, $sqlConsulta);
 
    // Verifica se há resultados
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>DataNascimento</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th>Número da Casa</th>
                </tr>";
 
        // Exibe os resultados
        while ($row = mysqli_fetch_assoc($resultadoConsulta)) {
            $cpf = $row['cpf'];
            echo "<tr>
                    <td>{$row['cpf']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['celular']}</td>
                    <td>{$row['datanascimento']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['endereco']}</td>
                    <td>{$row['nrcasa']}</td>

                    <td> 
                    <a href='editar_cliente.php?cpf=$cpf'>editar</a>
                    <a href='excluir_cliente.php?cpf=$cpf'>Excluir</a>
                  </tr>";

        
        }
        echo "</table>";
    } else {
        echo "Sem clientes no registro.";
    }
}
?>
 