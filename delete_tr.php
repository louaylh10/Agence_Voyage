<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM voyage WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
header('Location: dashboard.php');
exit(); 
?>

