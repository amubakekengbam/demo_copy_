<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
$output= array();

$data=explode("_",$_POST['id']);

$report_id = $data[0];
$oil_table_id = $data[1];

    $sql =  "UPDATE oil_report SET oil_status='1' WHERE report_id=$report_id and oil_table_id=$oil_table_id";
    if (mysqli_query($conn, $sql)) {
        $data="Successfully Updated";
        $flag = '1';
      } else {
        $flag = '0';
        $data="Error updating record" . mysqli_error($conn);
      }
$output = array(
    'data'=> $data,
    'flag'=> $flag   
    );
echo json_encode($output);
    
    
    


?>