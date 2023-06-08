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



function generateToken($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, strlen($characters) - 1);
        $token .= $characters[$randomIndex];
    }

    return $token;
}
exit;
?>