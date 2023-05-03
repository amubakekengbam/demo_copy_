<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

?>


<?php
    if($_POST['submit']) {

    $oil_type=$_POST['oil_type'];
    $vehicle_number=$_POST['vehicle_number'];
    $purpose=$_POST['purpose'];
    $duty_on=$_POST['duty_on'];
    $consum_rate=$_POST['consum_rate'];
    $last_issued=$_POST['last_issued'];
    $left_then=$_POST['left_then'];
    $left_now=$_POST['left_now'];
    $present_milometer=$_POST['present_milometer'];
    $previous_milometer=$_POST['previous_milometer'];
    $cover_milometer=$_POST['cover_milometer'];


    // prepare and bind with form attached.
    $stmt = $conn->prepare("INSERT INTO oil (oil_type, vehicle_number, purpose, duty_on, consumption_rate,  last_issue_quantity,
     left_then, left_now, present_milometer, prev_milometer, cover_milometer) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss",$oil_type, $vehicle_number, $purpose, $duty_on,$consum_rate,$last_issued,$left_then,
     $left_now, $present_milometer, $previous_milometer,$cover_milometer);
    $stmt->execute();

    if (!$stmt->execute()) {
        print_r($stmt->errorInfo());
    }
    echo 'asdf';
    }
    ?>