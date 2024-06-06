
<?php
session_start();
try {
    $pdo =new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}


$email = $_POST['email'];
$password = $_POST['pwd'];


$query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
$query->execute(array(':email' => $email));
$user = $query->fetch(PDO::FETCH_ASSOC);
if($email=="TR_ADMIN@trvl.com" && $password=="12345678912"){
echo "Hello Adminstrator.";
}
else if ($user && password_verify($password, $user['password'])) {
    echo "Successful connection";
    
    $_SESSION["name"] = $user["name"]; 
    $_SESSION["email"] = $user["email"]; 
    $_SESSION["id"] = $user["id"]; 
} else {
    echo "Incorrect identifiers";
}

?>