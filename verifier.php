<?php

try {
    $pdo =new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}


$email = $_POST['email'];



$query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
$query->execute(array(':email' => $email));
$user = $query->fetch(PDO::FETCH_ASSOC);


if ($user) {
    echo $user["phone_number"];
} else {
    echo "User not found";
}

?>