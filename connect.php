<?php
try {
    $pdo =new PDO('mysql:host=localhost;dbname=agence_voyage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
?>