<inc<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Form-v6 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/nunito-font.css" />
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="form-v6">
    <div>

    <?php
 include("../config/dbcon.php");
 ?>
	
    </div>
    <div class="page-content">
      <div class="form-v6-content">
        <div class="form-left">
          <img src="images/High_court_logo" alt="form" />
        </div>
        <form class="form-detail" action="#" method="post">
          <h2>Register Form</h2>
          
<?php 
 $sql = "SELECT * FROM phone";
 $result = $conn->query($sql);
 
 
?>
          <div class="form-row">

          <select name="" class="input-text" id="" required>
            <?php 
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
         ?>
         <option value="<?=$row["phone_number"]?>"><?=$row["phone_number"]?></option>
                <?php  
              }
          }?>
            
          </select>
            <input
              type="number"
              name="phone-number"
              id="phn-number"
              class="input-text"
              placeholder="Phone Number"
              required
            />
          </div>
          <div class="form-row">
            <input
              type="text"
              name="full-name"
              id="full-name"
              class="input-text"
              placeholder="Your Name"
              required
            />
          </div>
          <div class="form-row">
            <input
              type="text"
              name="your-email"
              id="your-email"
              class="input-text"
              placeholder="Email Address"
              required
              pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
            />
          </div>
          <div class="form-row">
            <input
              type="password"
              name="password"
              id="password"
              class="input-text"
              placeholder="Password"
              required
            />
          </div>
          <div class="form-row">
            <input
              type="password"
              name="comfirm-password"
              id="comfirm-password"
              class="input-text"
              placeholder="Comfirm Password"
              required
            />
          </div>
          <div class="form-row-last">
            <input
              type="submit"
              name="register"
              class="register"
              value="Register">              
          </div>
          <div class="form-row-last">
          <a href="login_page/index.php"><input style="padding: 13px;" class="btn btn-success register" type="button" value="Sign In"></a>
          </div>
        </form>
      </div>
    </div>

     
 <?php
 include("../includes/footer.php");
 ?>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
