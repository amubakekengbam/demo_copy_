<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

    if(isset($_POST['submit'])) {
   /* $user_id=$_SESSION['auth_user']['user_id'];
    $officer_id=$_SESSION['auth_user']['officer_user_id'];*/
    $reg_number=$_POST['reg_number'];
    $reg_date=$_POST['reg_date'];
    $manufacture_date=$_POST['manufacture_date'];
    $eng_no=$_POST['eng_no'];
    $chassis_no=$_POST['chassis_no'];
    $fuel_type=$_POST['fuel_type'];
    
    $qry="SELECT * FROM vehicle_list ";
    $result = $db->prepare($qry);
   $result=$conn->prepare("INSERT INTO 'vehicle_list' (registration_no, reg_date, manufacture_date,eng_no,chassis_no,fuel_type) VALUES (?,?,?,?,?,?)");
   $result->bind_param("ssssss",$reg_number, $reg_date,$manufacture_date,$eng_no,$chassis_no,$fuel_type);
   $result-> execute();
   $last = $conn->insert_id;
    }
?>