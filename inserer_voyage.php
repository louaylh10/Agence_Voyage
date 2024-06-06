<?php
$dsn = 'mysql:host=localhost;dbname=votre_base_de_donnees';
$username = 'votre_nom_utilisateur';
$password = 'votre_mot_de_passe';
try {
    $pdo =new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
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
