<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $numb = $_POST['numb'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    
    $query = "SELECT * FROM user WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Cet email est déjà utilisé.";
        exit;}
        else{

         $stmt = $db->prepare("INSERT INTO user (name, email, phone_number, password) VALUES (:nom, :email, :numb, :pwd)");
         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':numb', $numb);
         $stmt->bindParam(':pwd', $pwd);
         $stmt->execute();
         echo "Confirmed registration";
        }
           
        }

?>