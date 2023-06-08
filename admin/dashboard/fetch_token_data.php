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
        $sub_array[]='<a type="button" id="fetch_token_id" class="btn btn-primary" data-toggle="modal"
        href="#modal-primary" data-id="'.$row["oil_id"].'">
        generate token
        </a>
        <button type="button" class="btn btn-success swalDefaultSuccess">
        Launch Success Toast
        </button>';
        $sub_array[]='<a class="btn btn-success" href="oil_request_view.php?id='.$row["oil_id"].'">View</a>';
        $data[] = $sub_array;

}
}


$output = array(
'draw'=> intval($_POST['draw']),
'data'=>$data,
);
echo json_encode($output);



?>