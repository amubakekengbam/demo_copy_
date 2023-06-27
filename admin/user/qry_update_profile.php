   <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the updated form data
            $updatedName = $_POST['name'];
            $updatedEmail = $_POST['email'];
            $updatedBio = $_POST['bio'];
            $photo=$_POST['photo'];
        
            // Update the profile data in the database
            $updateQuery = "UPDATE users SET name = '$updatedName', email = '$updatedEmail', bio = '$updatedBio' WHERE id = $userID";
        
            if ($connection->query($updateQuery) === TRUE) {
                echo "Profile updated successfully.";
            } else {
                echo "Error updating profile: " . $connection->error;
            }
        }
        ?>
        




    