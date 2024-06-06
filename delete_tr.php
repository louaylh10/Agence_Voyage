<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM voyage WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
header('Location: dashboard.php');
exit(); 
?>

