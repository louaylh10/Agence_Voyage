<?php

    try {
        $db = new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
        
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST["email"];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $stmt = $db->prepare("UPDATE user SET password=:pwd WHERE email=:email;");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->execute();
    echo "Password changed";
        }
            
        

?>
