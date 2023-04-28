<?php
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');

?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> REPORT TABLE</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Report Table</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 text-blue"> OIL TABLE</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th> Request</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">view</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td> Registrar General</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 2%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Joint Registrar</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="fa-fa-eye" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Assistant Registrar -2</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 10%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td> Assistant Registrar-3 </td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#"></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
<!-- 
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Condensed Full Width Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Cron job running</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div> 
                    <!-- /.card -->
                </div> 
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 text-blue"> SERVICING TABLE</h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                       <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                        <!-- /.card-body -->
                    <!-- </div>          </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Cron job running</td> -->
                           
                    <!-- /.card -->
<!-- 
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Striped Full Width Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Request</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Acting Chief Justice</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: %"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td> Judges -1</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td> Judges-2</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>CPC</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td><a href="" name="view"><button class="btn add btn-primary">View</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div> 
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 text-blue">Report of Oil After Request Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>183</td>
                                        <td> Mr. Justice M.V.</td>
                                        <td>11-3-2023</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td> Issue as  per criteria.</td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>Mr.Justice A. Bimol Singh</td>
                                        <td>11-2-2023</td>
                                        <td><span class="tag tag-warning">Approve</span></td>
                                        <td>Issue as  per criteria.</td>
                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>Shubham Vashist</td>
                                        <td>29-3-2023</td>
                                        <td><span class="tag tag-primary">Approved</span></td>
                                        <td>Issue as  per criteria.</td>
                                    </tr>
                                    <tr>
                                        <td>175</td>
                                        <td>Salam</td>
                                        <td>28-3-2023</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>minimum allocation exceeded.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 text-blue">Report of Servicing After Request Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Salam</td>
                                        <td>11-7-2023</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>Issue as per criteria..</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>minimum allocation exceeded.</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Mr.Justice A. Bimol Singh</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-primary">Approved</span></td>
                                        <td>Issue as per criteria.</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Salam </td>
                                        <td>11-7-2023</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>minimum allocation exceeded.</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td> Salam</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>Issue as per criteria.</td>
                                    </tr>
                                    <tr>
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-primary">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Expandable Table</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="5">
                                            <p>
                                                
                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>657</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-3-25</td>
                                        <td>Approved</td>
                                        <td>.</td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="5">
                                            <p>

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Pending</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Approved</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                        <td>Denied</td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">

                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Expandable Table Tree</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td class="border-0">183</td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>
                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            219
                                        </td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td>
                                            <div class="p-0">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr data-widget="expandable-table" aria-expanded="false">
                                                            <td>
                                                                <i
                                                                    class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                219-1
                                                            </td>
                                                        </tr>
                                                        <tr class="expandable-body d-none">
                                                            <td>
                                                                <div class="p-0" style="display: none;">
                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>219-1-1</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>219-1-2</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>219-1-3</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr data-widget="expandable-table" aria-expanded="false">
                                                            <td>
                                                                <button type="button" class="btn btn-primary p-0">
                                                                    <i
                                                                        class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                </button>
                                                                219-2
                                                            </td>
                                                        </tr>
                                                        <tr class="expandable-body d-none">
                                                            <td>
                                                                <div class="p-0" style="display: none;">
                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>219-2-1</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>219-2-2</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>219-2-3</td>
                                                                            </tr>

                                                                        </tbody>
                                                                </div>
                                                </table>
                                            </div>
                                        </td>

                                </tbody>
                                </tr>
                            </table> <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
</div>
<?php
include("../includes/footer.php");
?>
</body>

</html>