   <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the updated form data
            $updatedName = $_POST['exampleInputEmail1'];
            $updatedEmail = $_POST['exampleInputPassword1'];
            $updatedBio = $_POST['bio'];
            $photo=$_POST['photo'];
        
            // Update the profile data in the database
            $updateQuery = "UPDATE users SET email = '$updatedName', passwoord= '$updatedEmail', photo = '$photo' WHERE user_id= $userID";
        
            if ($connection->query($updateQuery) === TRUE) {
                echo "Profile updated successfully.";
            } else {
                echo "Error updating profile: " . $connection->error;
            }
        }
        ?>
        




    