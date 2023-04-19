

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
                <img src="<?= $url ?>assests/dist/img/<?=$_SESSION['auth_user']['photo'] ?>"
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
                    <a href=".././frm_profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/registered.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Register user
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/user_role.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Role for User
                        </p>
                    </a>
                </li>

                <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Vehicle Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD DRIVER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../form/frm_registration.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registration</p>
                            </a>
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
                    <a href="<?= $url ?>user/frm_profile.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../form/frm_registration.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Register user
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $url ?>dashboard/user_role.php" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Role for User
                        </p>
                    </a>
                </li>

                <li class="nav-header"> Setting </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Vehicle Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./form/frm_add_user.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD DRIVER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../form/add_driver.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../form/frm_registration.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registration</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <?php 
                        } //end of if($role_id == 2)
                            
                        if($role_id == 3){   //driver
                            ?>
                <!--HTML CONTENT-->

                <li class="nav-item">
                    <a href="<?= $url ?>index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </br>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php  } //end of if($role_id == 3)  ?>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>