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
        // Connect to the database and query the user table

        $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        // Check if a matching row was found in the user table
        if (mysqli_num_rows($result) == 1) {
            foreach($result as $row){
                $user_id= $row['user_id'];
                $user_name=$row['full_name'];
                $user_email=$row['email'];
                $user_phone=$row['mobile'];
                $pic=$row['photo'];
                $role_as= $row['role_id'];
                /*from the sql  command email and password we get login nad print detail from foreach loop  we print it*/
            }
            $_SESSION['auth']=$role_as;
            $_SESSION['auth_user']=[
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'user_email'=>$user_email,
                'user_phone'=>$user_phone,
                'user_pic'=>$pic
            ];

        
                        // Set the session variable
            // header("Location:../index.php"); // Redirect the user to the dashboard page
            // exit();
            header("location: authentication.php");
        } else {
            $_SESSION['login_error'] = "Invalid username or password.";
            header("location: loginnew.php");
        }
      


        mysqli_close($conn);
    }
}