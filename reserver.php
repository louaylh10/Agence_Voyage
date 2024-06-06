<?php
session_start();
  try {
    $db = new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$date_time_system = date("Y-m-d H:i:s");
$email=$_SESSION["email"];
$stmt=$db->prepare("SELECT id FROM user WHERE email=:email;");
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id=$row["id"];
$id_v=$_POST["id_v"];
$nb=$_POST["nbpr"];
$stmt=$db->prepare("INSERT INTO reservations (id_user, id_voyage, nb_Tickets, Booking_Time) values(:id,:idv,:nb,:dt)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':idv', $id_v);
$stmt->bindParam(':nb', $nb);
$stmt->bindParam(':dt', $date_time_system);
$stmt->execute();

header("Location: homepage.php");
}

?>