
<?php
require_once 'db.php';
$database = new Database();
$database->connect();
$pdo = $database->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->execute([$id]);

    // Redireciona para a página principal
    header("Location: index.php");
    exit();
}
?>