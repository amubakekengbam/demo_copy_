<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/path.php");
if (isset($_POST['submit'])) {
    // Retrieve the updated form data
    $updatedMobile = $_POST['mobile'];
    $updatedPassword = $_POST['exampleInputPassword1'];
    $updatedPassword1 = $_POST['exampleInputPassword2'];
    $massage='successfully updated your profile ';

    // if($updatedPassword==$updatedPassword1){
    //     echo"password match";
    // }else{
    //     echo"password not match";
    // }
    
    $target_dir = "../assests/uploads/";
    $photo_name = rand(11111,99999).basename($_FILES["fileupload"]["name"]);
    $photo = $target_dir.$photo_name;
    $imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION));
    $id = $_SESSION['auth_user']['user_id'];

    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
    if ($check !== false ) {
        // Update the profile data in the database
        if (file_exists($photo) && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Image Already exist or Not supported";
        } else {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $photo)) {

                $updateQuery = "UPDATE users SET mobile = '$updatedMobile', password= '$updatedPassword', photo = '$photo_name' WHERE user_id = $id";

                if ($conn->query($updateQuery) === TRUE) {
                    $_SESSION['auth_user']['photo'] = $photo_name;

                    $_SESSION['msg_status'] = 'success';    
                    $_SESSION['msg'] = 'Successfully Updated';    
                    header('Location: '.URL_ROOT.'/admin/user/update_profile.php');
                } else {
                    echo "Error updating profile: " . $conn->error;
                }
            } else {
                $_SESSION['msg_status'] = 'error';    
                $_SESSION['auth_user']['msg'] = 'Failed To Update Profile';
                header('Location: '.URL_ROOT.'/admin/user/update_profile.php');            
            }
        }
    } else {
        $_SESSION['msg_status'] = 'error';    
        $_SESSION['msg'] = 'File is not in Image Format';
        header('Location: '.URL_ROOT.'/admin/user/update_profile.php');   
    }
}

?>