<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/path.php");


$officer_id = $_POST['officer_id'];
$oil_id = $_POST['oil_id'];
// echo "save success ".$data1."---------".$data2;

$designation = '';
$get_officer_name = $conn->query("SELECT designation FROM users where user_id='$officer_id'");
if ($get_officer_name->num_rows > 0) {
  // output data of each row
  while ($row = $get_officer_name->fetch_assoc()) {
    $designation = $row["designation"];
  }
} else {
  echo "0 results";
}


$check_duplicate_oil_entry = $conn->query("SELECT * FROM oil_report where oil_table_id='$oil_id' and o_user_id='$officer_id'");
if ($check_duplicate_oil_entry->num_rows > 0) {
  $val = 0;
} else {
  $val = 1;
}

if ($val == 1) {
  $stmt = $conn->prepare("INSERT INTO oil_report (oil_table_id, o_user_id,o_desg_name) VALUES (?,?,?)");
  $stmt->bind_param("sss", $oil_id, $officer_id, $designation);
  //  $stmt->execute();
  if (!$stmt->execute()) {
    echo "Failed to Update the Request";
  } else {
    echo "Oil Request Has been forwarded to the Concerned Officer";
  }
} else {
  echo "Already Forwarded to the Selected Concerned Officer";
}


//  $pdo=null;  
?>