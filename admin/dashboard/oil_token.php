<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
?>
<?php

$selectQuery = "SELECT * FROM oil_report WHERE id = report_id";
$stmtSelect = $pdo->prepare($selectQuery);
$stmtSelect->bindValue('report_id', $userId);
$stmtSelect->execute();

$userData = $stmtSelect->fetch(PDO::FETCH_ASSOC);

// Store user data in session
$_SESSION['userData'] = $userData;

// Redirect to the second page
header("Location: second_page.php");
exit;
?>