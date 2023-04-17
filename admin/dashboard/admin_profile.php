<?php
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');

?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Profiles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Profiles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="center">
        <h1> User Registration</h1>
        <table id="user">
            <tr>
                <th> Id</th>
                <th>Username </th>
                <th> Email Address>
                <th>
                <th> Action </th>

            </tr>
    </div>


<?php
$query= " SELECT * FROM register WHERE status ='pending' ORDER BY id ASC";
$result =mysqli_query($conn, $query);
while($row - msqli_fetch_array($result)){
?>
<tr>
    <td> <?php echo $row['id'];?></td>
    <td> <?php echo $row['id'];?></td>
    <td> <?php echo $row['id'];?></td>
</tr>


</table>
<?php }
?>
<?php
include("../includes/footer.php");
?>
</div>
</body>

</html>