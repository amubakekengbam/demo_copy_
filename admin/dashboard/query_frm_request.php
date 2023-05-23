<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

?>


<?php
    if($_POST['submit']) {
    $user_id=$_SESSION['auth_user']['user_id'];
    $officer_id=$_SESSION['auth_user']['officer_user_id'];
    $subject_request=$_POST['sub_request'];
    $oil_type=$_POST['oil_type'];
    $amount_in_liter=$_POST['amount_oil'];
    $vehicle_number=$_POST['vehicle_number'];
    // $purpose=$_POST['purpose'];
    $duty_on=$_POST['duty_on'];
    $consum_rate=$_POST['consum_rate'];
    $last_issued_date=$_POST['last_issued_date'];
    $last_issued=$_POST['last_issued'];
    $left_then=$_POST['left_then'];
    $left_now=$_POST['left_now'];
    $present_milometer=$_POST['present_milometer'];
    $previous_milometer=$_POST['previous_milometer'];
    $cover_milometer=$_POST['cover_milometer'];


    // prepare and bind with form attached.
    $stmt = $conn->prepare("INSERT INTO oil (user_id, officer_id,sub_request, oil_type,amount_oil, vehicle_number,  duty_on, consumption_rate, last_issued_date, last_issue_quantity,
     left_then, left_now, present_milometer, prev_milometer, cover_milometer) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssss",$user_id,$officer_id ,$subject_request,$oil_type,$amount_in_liter, $vehicle_number, $duty_on,$consum_rate, $last_issued_date,$last_issued,$left_then,
     $left_now, $present_milometer, $previous_milometer,$cover_milometer);
     $stmt->execute();
     $last= $conn->insert_id;
    if (!$last) {
        print_r($stmt->errorInfo());
    }
     else{    
        $stmt = $conn->prepare("INSERT INTO oil_report (oil_table_id, o_user_id) VALUES (?,?)");
    $stmt->bind_param("ss",$last,$officer_id);
     $stmt->execute();
        
    echo 'form has successfully send'.$last;
   // header('Location:index.php');
     }
    }
    ?>