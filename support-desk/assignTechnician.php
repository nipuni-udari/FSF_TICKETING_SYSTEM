<?php
ini_set('display_errors', 'On');
session_start();
include('connect.php');

// Get the JSON payload
$data = json_decode(file_get_contents('php://input'), true);

$technician = $data['technician'];
$ticketNo = $data['ticketNo'];

if ($technician && $ticketNo) {
    $query = "UPDATE FSF_TICKETING_USER SET TECHNICIAN_ASSIGNED = '$technician' WHERE TICKET_NO = '$ticketNo'";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>