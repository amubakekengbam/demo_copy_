<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

    if(isset($_POST['submit'])) {
   /* $user_id=$_SESSION['auth_user']['user_id'];
    $officer_id=$_SESSION['auth_user']['officer_user_id'];*/
    $off_inCharge=$_POST['off_inCharge'];
    $vehicle_number=$_POST['vehicle_number'];
    $driver=$_POST['driver_name'];
    $date_assign=$_POST['date_assign'];
    $service_date=$_POST['service_date'];
    // $purpose=$_POST['purpose'];
     
    $qry="SELECT * FROM vehicle_number WHERE v_number=?";
    $stmt = $db->prepare($qry);
    $resp = $stmt->execute([$vehicle_number]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($data)){
      $stmt = $conn->prepare("INSERT INTO vehicle_number (officer_user_id, v_number,driver, date_assign,servicing_date) VALUES (?,?,?,?,?)");
      $stmt->bind_param("sssss",$off_inCharge,$vehicle_number ,$driver,$date_assign,$service_date);
      $stmt->execute();
      $last= $conn->insert_id;
      echo "Data Inserted";
    }else{
      echo "Vehicle Already Exist";
    }
  }
?>