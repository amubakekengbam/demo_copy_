<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $url ?>index.php" class="brand-link">
        <img src="<?= $url ?>assests/dist/img/High_court_logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> Vehicle_Managment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $url ?>assests/uploads/<?=$_SESSION['auth_user']['photo'] ?>"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$_SESSION['auth_user']['full_name'] ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->





                <?php if($role_id == 1){ //admin  ?>
                <!--HTML CONTENT-->
                <li class="nav-item">
                    <a href="<?= $url ?>user/profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="<?= $url ?>dashboard/registered.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Register user
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_report_new.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>

                <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $url ?>form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Officer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Remove Officer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Role</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <!-- <a href="../admin/form/frm_registration.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registration</p>
                            </a> -->
                        </li>
                    </ul>
                </li>

                <?php
                        } //end of if($role_id == 1)

                        if($role_id == 2){ //officer
                        ?>
                <!--HTML CONTENT-->
                <!--HTML CONTENT-->
                <li class="nav-item">
                    <a href="<?= $url ?>user/profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>user/update_profile.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            profile update                        </p>
                    </a>
                </li>
                <!-- 
                <li class="nav-item">
                    <a href="/admin/form/frm_registration.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Register user
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_report_new.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_request.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Request
                        </p>
                    </a>
                </li>






                <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $url ?>form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Driver</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/remove_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Remove Driver</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <?php 
                        } //end of if($role_id == 2)
                            
                        if($role_id == 3){   //driver
                            ?>

                <li class="nav-item">
                    <a href="<?= $url ?>user/profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>user/update_profile.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            profile update                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_report_new.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_request.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Request
                        </p>
                    </a>
                </li>






                <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $url ?>form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Driver</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/remove_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Remove Driver</p>
                            </a>
                        </li>


                    </ul>
                </li>



                <?php  } //end of if($role_id == 3)
                
                if($role_id==4){
?>


                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Request
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $url ?>dashboard/frm_request.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>oil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/remove_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>servicing </p>
                            </a>
                        </li>


                    </ul>
                </li>


                <?php  }
               
            ?>


                <?php if($role_id == 5){  ?>
                <!--HTML CONTENT-->
                <li class="nav-item">
                    <a href="<?= $url ?>user/profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="<?= $url ?>dashboard/registered.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Register user
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/frm_oil_token.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>user/update_profile.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            profile update                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url ?>form/frm_add_vehicle.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                           Add Vehicle
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a> -->
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $url ?>form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Officer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Remove Officer</p>
                            </a>   
                        </li>
                        <li class="nav-item">
                            <a href="<?= $url ?>form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Role</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <!-- <a href="../admin/form/frm_registration.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registration</p>
                            </a> -->
                        <!-- </li> -->
                    <!-- </ul> -->
                </li>

            


                <?php  }
               
            ?>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>