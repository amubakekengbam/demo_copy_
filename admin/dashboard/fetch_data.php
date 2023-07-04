<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
$output= array();
$user_id= $_SESSION['auth_user']['user_id'];
$sql =  "SELECT 
*
 FROM oil l
  INNER JOIN oil_report r
   ON l.oil_id = r.oil_table_id where r.o_user_id = $user_id ";


$result = $conn->query($sql);

  
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        $sub_array = array();
        if($row['oil_status']==1){
            $val_status='Approved';
            $val_status1='disabled';
        }elseif($row['oil_status']==2){
            $val_status= 'Token Available';
        }else{
            $val_status= 'Pending';
            $val_status1='';
        }

        $sub_array[]= $row['oil_id'];
        $sub_array[]= $row['vehicle_number'];
        $sub_array[]= $row['amount_oil'];
        $sub_array[]= $val_status;
        $sub_array[]='<a type="button" id="fetch_oil_id" class="btn btn-primary fetch_oil_id" data-toggle="modal"
        href="#modal-primary" data-id="'.$row["oil_id"].'">
        Update
        </a>
        <button type="button" class="btn btn-success test">
        Launch Success Toast
        </button>';    
        $sub_array[]='
        <div class="form-group btn-group">
        <a style="padding-right:5px;">
        <button type="button" class="btn btn-md btn-outline-danger reject_request" title="Cancel"  name="reject_request" id="reject_request" value="0_'.$row["oil_id"].'_"'.$val_status1.'><i class="fa fa-ban" ></i></button></a>
        <a>
        <button type="button" class="btn btn-md btn-outline-success approve_request"  title="Approve" name="approve_request"  id="approve_request" value="'.$row["report_id"].'_'.$row["oil_table_id"].'"'.$val_status1.'><i class="fa fa-check"></i></button></a>
        </div>
        ';
        $sub_array[]='<a class="btn btn-success" href="oil_request_view.php?id='.$row["oil_id"].'">View</a>';
        $data[] = $sub_array;

}
}



$output = array(
'data'=>$data,
);
echo json_encode($output);



?>
