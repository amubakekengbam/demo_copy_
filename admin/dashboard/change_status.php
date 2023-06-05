
<?php

$id=$_POST['report_id'];
$status=$_POST['oil_status'];
$query="UPDATE `oil_report` SET `report_id`='[value-1]',`oil_table_id`='[value-2]',`o_user_id`='[value-3]',`o_desg_name`='[value-4]',`oil_status`='[value-5]',`date`='[value-6]' WHERE 'report_id'=$id";
$stmt = $pdo->prepare($query);
?>


<?php

$id = 'report_id'; // Example identifier value
$newValue1 = 'reject';
$newValue2 = 'approve';

$stmt->bindValue(':0', $newValue1);
$stmt->bindValue(':1', $newValue2);
$stmt->bindValue(':id', $id);

$smt->execute();

 if($newValue2==1){

    $data=array(
        'status'=>"approve",
    );
    echo json_encode($data);
 }
else{
    $data=array(
        'status'=> 'reject',
    );
    echo json_encode($data);
}


$affectedRows = $stmt->rowCount();
if ($affectedRows > 0) {
    echo "Update successful";
} else {
    echo "No rows updated";
}

?>

<?php
// Retrieve the status value sent from the AJAX request
$status = $_POST['status'];

// Perform necessary validation or sanitization on the status value

// Update the status in the database using your preferred method (e.g., PDO, MySQLi)

// Return a response to indicate the status change result

if ($status) {
  $response = '1';
} else {
  $response = '0';
}

// Send the response back to the AJAX request
echo $response;
?>