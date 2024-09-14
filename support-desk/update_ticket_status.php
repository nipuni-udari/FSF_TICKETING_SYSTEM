<?php
ini_set('display_errors', 0);
session_start();
include('connect.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ticket_no = mysqli_real_escape_string($conn, $_POST['ticket_no']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $reject_remark = isset($_POST['reject_remark']) ? mysqli_real_escape_string($conn, $_POST['reject_remark']) : '';

    if ($status == 'RESOLVED') {
        $ticket_resolved = 'YES';
        $ticket_rejected = 'NO';
        $ticket_resolved_date = date('Y-m-d H:i:s');
        $ticket_status_date = $ticket_resolved_date;
    } elseif ($status == 'REJECTED') {
        $ticket_resolved = 'NO';
        $ticket_rejected = 'YES';
        $ticket_rejected_date = date('Y-m-d H:i:s');
        $ticket_status_date = $ticket_rejected_date;
    }

    $query = "UPDATE FSF_TICKETING_USER SET 
              TICKET_STATUS = '$status', 
              TICKET_RESOLVED = '$ticket_resolved', 
              TICKET_REJECTED = '$ticket_rejected', 
              TICKET_RESOLVED_DATE = IF('$status' = 'RESOLVED', '$ticket_resolved_date', NULL), 
              TICKET_REJECTED_DATE = IF('$status' = 'REJECTED', '$ticket_rejected_date', NULL), 
              TICKET_STATUS_DATE = '$ticket_status_date',
              REJECT_REMARK = IF('$status' = 'REJECTED', '$reject_remark', NULL)
              WHERE TICKET_NO = '$ticket_no'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

?>