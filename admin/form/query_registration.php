<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
?>


<?php
if ($_POST["register"]) {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];

    $query = "SELECT * FROM phone WHERE phone_number='$phone'";
    $result = mysqli_query($conn, $query);

/* associative array */
$row1 = $result->fetch_array(MYSQLI_ASSOC);
if(!empty($row1)){
    if ($pwd == $cpwd) {
        $query = "INSERT INTO REGISTRATION (fname, email, password, phone, role, gender) VALUES('$fname','$email' , '$pwd', '$phone', '$role','$gender')";
        $data = mysqli_query($conn, $query);
            if ($data) {
                echo "Successfully Register";
            } else {
    
                echo "Fail to register". mysqli_error($conn);
            }
        } else {
            echo "Password not Match";
        }
}else{
    echo "phone number not found";
}
}
?> 