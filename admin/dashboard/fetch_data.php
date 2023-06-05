<?php
$getUsers = $DBH->prepare("SELECT * FROM oil_report ORDER BY id ASC");
$getUsers->execute();
$users = $getUsers->fetchAll();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 


        $sub_array = array();

         
        $subarray[]= $row['report_id'];
        $subarray[]= $row['oil_table_id'];
        $subarray[]= $row['o_user_id'];
        $subarray[]= $row['o_desg_name'];
        $subarray[]= $row['oil_status'];
    }

?>