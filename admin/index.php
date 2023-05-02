<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

if(empty($_SESSION['auth_user']['user_id'])){
    header('location:includes/loginnew.php');
}

$role_id = $_SESSION['auth_user']['role_id'];

include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- <style>
        .content-wrapper{
 background-image: url("admin\assests\dist\img\High_court_logo.png");
 background-color: #cccccc;
        }
</style> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin/index.php">Home</a></li>
                        <li class="breadcrumb-item active"> <a href="includes/logout.php">logout</a> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- <?php echo $_SESSION['auth_user']['role_id']?> -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner" style="background-color:Tomato ;">
                            <h3>Hello</h3>
                            <!-- <h3><?=$_SESSION['username']?></h3> -->
                            <?=$_SESSION['auth_user']['designation']?>
                            <h2> Welcome to Vehicle Management System <?= $_SESSION['auth_user']['full_name'] ?></h2>
                            <p></p>
                            <!-- <?php echo $_SESSION['auth_user']['verify_status']?> -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>




                <?php
  if($role_id == 1){
  ?>
                <!--HTML CONTENT-->
 <!--HTML CONTENT-->
 <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Number of Vehicle</h3>
                            <h2>10</h2>
                            <h2>Number of Driver: 5</h2>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Approved Drivers<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <?php
  } //end of if($role_id == 1)

  if($role_id == 2){
  ?>
                <!--HTML CONTENT-->
                <div class="col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Number of Vehicle</h3>
                            <h2>10</h2>
                            <h2>Number of Driver: 5</h2>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Approved Drivers<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>                
                </div>



                <?php 
  } //end of if($role_id == 2)
    
  if($role_id == 3){   ?>
                <!--HTML CONTENT-->
                <div class="col-lg-6" style="background-color:LightGray ;">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> Request Form </h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <?php  } if($role_id==4){ //end of if($role_id == 3)  ?>
                    <div class="col-lg-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> Approved By: </h3>

                            <?php 
                                global $db;
                                $sth = $db->query('SELECT user_id, full_name, email, mobile, designation, officer_user_id  FROM users WHERE user_id='.$_SESSION['auth_user']['officer_user_id'].'');

                                // fetch all rows into array, by default PDO::FETCH_BOTH is used
                                $officer_data = $sth->fetch();
                                
                                // iterate over array by index and by name
                                echo $officer_data['full_name'];   
                            ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                    <?php }?>

                

    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header bg-grey">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            About Vehicle Managment
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body bg-info">
                        <p>
                            A vehicle management system is a software application designed to help manage and
                            maintain a fleet of vehicles, such as cars, trucks, buses, or other types of vehicles.
                            It provides a central platform for managing various aspects of a fleet, including
                            maintenance schedules, fuel consumption, driver information, and vehicle tracking.

                        </P>
                        <p> The system typically includes features such as: </p>
                        <P>Maintenance scheduling: The system can help to schedule regular maintenance tasks, such
                            as oil changes, tire rotations, and inspections, to keep vehicles in good condition and
                            avoid breakdowns</p>
                    </div><!-- /.card-body -->
                </div>
            </div>
    </section>

</div>



<?php
include("includes/footer.php");
?>
</body>

</html>