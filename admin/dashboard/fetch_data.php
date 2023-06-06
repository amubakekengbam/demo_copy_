<?php

$sql = "SELECT * FROM oil_report";
$stmt = $db->prepare($sql);
$stmt->execute();
?><?php
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {

        $sub_array = array();

         
        $subarray[]= $row['report_id'];
        $subarray[]= $row['oil_table_id'];
        $subarray[]= $row['o_user_id'];
        $subarray[]= $row['o_desg_name'];
        $subarray[]= $row['oil_status'];
        $subarray[]='<a>
        <button type="button" class="btn btn-block btn-outline-danger btn-sm "   name="reject_request" id="reject_request" value="0"><i class="fa fa-ban" style="font-size:48px;color:red"></i></button></a>
        <a>
        <button type="button" class="btn btn-block btn-outline-success btn-sm" name="approve_request"  id="approve_request" value="1"><i class="fa fa-check" style="font-size:48px;color:green"></i></button></a>';
        $subarray[]='<a class="btn btn-success" href="'.$url.'dashboard/oil_request_view.php?id='.$row["oil_id"].'">View</a>';  
        $data[]=$subarray;
    }
    $output=array(

        "draw"=> intval($_POST["draw"]),
        "recordsTotal"=> $filtered_rows,
        'data'=>$data,
        "recordsFiltered" => 100,

    );


?>