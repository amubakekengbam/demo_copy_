<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

?>


<?php
    if($_POST['submit']) {
   /* $user_id=$_SESSION['auth_user']['user_id'];
    $officer_id=$_SESSION['auth_user']['officer_user_id'];*/
    $off_inCharge=$_POST['off_inCharge'];
    $vehicle_number=$_POST['vehicle_number'];
    $driver=$_POST['driver_name'];
    $date_assign=$_POST['date_assign'];
    $servicing_date=$_POST['servicing_date'];
    // $purpose=$_POST['purpose'];
     
    

    // prepare and bind with form attached.
    $stmt = $conn->prepare("INSERT INTO vehicle_number (officer_user_id, v_number,driver, date_assign,servicing_date) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssss",$officer_id,$vehicle_number ,$driver,$date_assign,$servicing_date);
     $stmt->execute();
     $last= $conn->insert_id;
    if (!$last) {
        print_r($stmt->errorInfo());
    }
     else{    
       /* $stmt = $conn->prepare("INSERT INTO oil_report (oil_table_id, o_user_id) VALUES (?,?)");
    $stmt->bind_param("ss",$last,$officer_id);
     $stmt->execute();*/
        
    echo 'form has successfully send'.$last;
   // header('Location:index.php');
     }
    }
    ?>