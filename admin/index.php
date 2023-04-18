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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> <a href="includes/logout.php">logout</a> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <!-- <h3><?=$_SESSION['username']?></h3> -->
                            <?=$_SESSION['auth_user']['designation']?>
                            <h2> welcome. <?= $_SESSION['auth_user']['full_name'] ?></h2>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
  if($role_id == 1){
  ?>
    <!--HTML CONTENT-->



    <?php
  } //end of if($role_id == 1)

  if($role_id == 2){
  ?>
    <!--HTML CONTENT-->



    <?php 
  } //end of if($role_id == 2)
    
  if($role_id == 3){   ?>
    <!--HTML CONTENT-->



    <?php  } //end of if($role_id == 3)  ?>
















    <?php
include("includes/footer.php");
?>
    </body>

    </html>