<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="style.css">
    <?php 
        require_once 'db.php'; // Inclui o arquivo db.php para conectar ao banco de dados
        $database = new Database(); // Cria uma nova instância da classe Database
        $database->connect(); // Conecta ao banco de dados
        $pdo = $database->getConnection(); // Obtém a conexão PDO para realizar consultas
    ?>
</head>
<body>
    <div class="box">
    <h1>Cadastro do aluno</h1> <!-- Título da página -->
    
    
    
     <form action="cadastro.php" method="POST"> <!-- Formulário que envia dados para o arquivo cadastro.php usando o método POST -->
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br> <!-- Campo de texto para o nome do aluno, obrigatório -->
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br> <!-- Campo numérico para a idade do aluno, obrigatório -->
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br> <!-- Campo de e-mail, obrigatório -->
        
        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br> <!-- Campo de texto para o curso, obrigatório -->
        
        <input type="submit" value="Cadastrar" style="background-color: #211f6b; color: white; padding: 10px 20px; border: none; border-radius: 12px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;"> <!-- Botão de envio do formulário com estilo inline -->
    </form>
</div>


    <!-- Listagem de Alunos -->
    <h2>Alunos Cadastrados</h2>
    <table border="1"> <!-- Tabela com borda simples para exibir os alunos -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM alunos"); // Prepara a consulta SQL para selecionar todos os alunos da tabela "alunos" 
        $stmt->execute(); // Executa a consulta SQL 
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Armazena todos os resultados da consulta em um array associativo
        
        foreach ($alunos as $aluno) { //Loop para percorrer cada aluno e exibir na tabela
            echo "<tr>";
            echo "<td>" . $aluno['id'] . "</td>"; // Exibe o ID do aluno 
            echo "<td>" . $aluno['nome'] . "</td>"; // Exibe o nome do aluno 
            echo "<td>" . $aluno['idade'] . "</td>"; // Exibe a idade do aluno 
            echo "<td>" . $aluno['email'] . "</td>"; // Exibe o e-mail do aluno 
            echo "<td>" . $aluno['curso'] . "</td>"; // Exibe o curso do aluno 
            echo "<td><a href='deletar.php?id=" . $aluno['id'] . "'>Excluir</a></td>"; // Link para excluir o aluno com base no ID 
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
