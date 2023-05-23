<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");


$selectQuery = "SELECT oil_id,officer_id  FROM oil ";
$stmtSelect = $conn->prepare($selectQuery);
$stmtSelect->execute();
$data = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
$insertQuery = "INSERT INTO oil_report(oil_table_id,o_user_id) VALUES (?,?)";
$stmtInsert = $conn->prepare($insertQuery);

foreach ($data as $row) {
  $stmtInsert->execute($row);

  echo"save success ";
}

?>





