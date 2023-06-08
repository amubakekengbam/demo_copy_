<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
$output= array();
$sql =  "SELECT * 
FROM oil";

$result = $conn->query($sql);


$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        $sub_array = array();
        $sub_array[]= $row['oil_id'];
        $sub_array[]= $row['vehicle_number'];
        $sub_array[]= $row['sub_request'];
        $sub_array[]=$row['sub_request'];
        $sub_array[]='<a type="button" id="fetch_oil_id" class="btn btn-primary fetch_oil_id" data-toggle="modal"
        href="#modal-primary" data-id="'.$row["oil_id"].'">
        Update
        </a>
        <button type="button" class="btn btn-success test">
        Launch Success Toast
        </button>';
        $sub_array[]='<a>
        <button type="button" class="btn btn-block btn-outline-danger btn-sm "   name="reject_request" id="reject_request" value="0"><i class="fa fa-ban" style="font-size:48px;color:red"></i></button></a>
        <a>
        <button type="button" class="btn btn-block btn-outline-success btn-sm" name="approve_request"  id="approve_request" value="1"><i class="fa fa-check" style="font-size:48px;color:green"></i></button></a>';
        $sub_array[]='<a class="btn btn-success" href="oil_request_view.php?id='.$row["oil_id"].'">View</a>';
        $data[] = $sub_array;

}
}


$output = array(
'data'=>$data,
);
echo json_encode($output);



?>