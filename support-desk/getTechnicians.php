<?php
ini_set('display_errors', 'On');
session_start();
include('connect.php');

$query2 = "SELECT TECHNICIAN_NAME AS name, TECHNICIAN_CATEGORY AS category FROM FSF_TICKETING_TECHNICIAN";
$result2 = mysqli_query($conn, $query2);

$technicians = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $technicians[] = $row2;
}

echo json_encode($technicians);
?>