<?php
include "connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $poster=base64_encode(file_get_contents($_FILES["poster"]['tmp_name']));
    $sql = "INSERT INTO voyage (titre,poster,max_visitor,description,deadline) VALUES (:title, :poster, :maxim, :descrep, :dead)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':poster', $poster);
    $stmt->bindParam(':maxim', $_POST['maxim']);
    $stmt->bindParam(':descrep', $_POST['descrep']);
    $stmt->bindParam(':dead', $_POST['dead']);
    $stmt->execute();
    header("Location: dashboard.php");
exit; 
}
?>
