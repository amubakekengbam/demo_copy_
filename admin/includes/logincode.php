<?php
session_start();
 include('../config/dbcon.php');
/*

if(isset($_post['submit'])){ 

    $email= $_POST["username"];
    $password=$_POST["password"];
    $log_query="SELECT * FROM officer email='$email' AND password ='$password' LIMIT 1";
    $log_quer_run= mysqli_query($conn, $log_query);

    if(mysqli_num_rows($log_query_run)>0){
        foreach($log_query_run as $row){
            $user_id= $row["officer_id"];
            $user_name=$row['officer_name'];
            $user_email=$row['officer_email'];
            $user_phone=$row['officer_phone_no'];

        }
        $_SESSION['auth']= true;
        $_SESSION['auth_user']=[
            '$user_id'=>$user_id,
            '$user_name'=>$user_name,
            '$user_email'=>$user_id,
            '$user_phone'=>$user_phone,
        ];
        $_SESSION['status']='logged in  Sucessfully';
        header('Location:index.php');  

    }else{
        echo "failed";
    }

}
else{
    $_SESSION['status']='Acess Denied';
    header('Location: ../index.php');  
}

*/




if (isset($_POST['submit']) == 'Login') {
    // Retrieve input data from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input data
    if (empty($username) || empty($password)) {
        $error = "Please enter a username and password.";
    } else {

        try{
            // Connect to the database and query the user table
            $qry = "select * from users WHERE email=? AND password=?  ";
            $stmt = $db->prepare($qry);
            $resp = $stmt->execute( [$username, $password] );
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$data){
                $_SESSION['login_error'] = "Invalid username or password.";
                header("location: loginnew.php");
            }
            set_login_session( $data );
            header("location: authentication.php");
        }
        catch (PDOException $e) {
           // $_SESSION['login_error'] = "Error: " . $e->getMessage();
            $_SESSION['login_error'] = "Error: Internal Server Error";
            header("location: loginnew.php");
        }
        
       
    }
}

function set_login_session($user){
    unset($user['password']);
    unset($user['created_at']);
    unset($user['updated_at']);
    $_SESSION['auth_user'] = $user;
}