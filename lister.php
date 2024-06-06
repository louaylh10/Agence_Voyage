<?php
include "connect.php";

if(isset($_GET['id'])) {
    
    $id = $_GET['id'];

    $qers = $pdo->prepare("SELECT * FROM reservations r,user u WHERE r.id_voyage=:id and r.id_user=u.id");
    $qers->bindParam(':id', $id);
    $qers->execute();
    $cnet = $qers->rowCount();

    if ($cnet == 0) {
        echo "<p class='erx'>No Booking Yet</p>";
    } else {
        echo "<table border='0'>
        <tr><th>Name</th><th>Tickets</th><th>Phone Number</th><th>Booking Time</th></tr>";
        while ($rvw = $qers->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>".$rvw["name"]."</td>
                    <td>".$rvw["nb_Tickets"]."</td>
                    <td>".$rvw["phone_number"]."</td>
                    <td>".$rvw["Booking_Time"]."</td>
                  </tr>";
        }
        echo "</table>";
    }
} else {
  
    echo "ID non défini";
}
?>
