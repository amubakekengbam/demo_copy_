<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/path.php");
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');
?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> OIL TOKEN TABLE</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Token Table</li>
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
                            <h3 class="m-0 text-blue"> TOKEN TABLE</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                <tr>
                                    <th style="width: 100px">Order Number</th>
                                    <th>vehicle_number</th>
                                    <th>Amount of oil</th>
                                    <th>Status</th>


                                    <?php if ($role_id == 5) {  // ?>
                                        <th>Generate Token</th>
                                    <?php } else {
                                        echo '<th>Forward To</th>';
                                    }
                                    ?>


                                    <th> Action</th>
                                    <th style="width: 40px">view</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <?php
                            $sql = "SELECT * 
                FROM oil as o
                LEFT JOIN oil_report as oa
                ON o.oil_id = oa.oil_table_id WHERE oa.o_user_id=" . $_SESSION['auth_user']['user_id'] . "";
                            ?>


                            <!-- model-primary end -->
                        </div>

                    </diV>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!--all modal div start from here-->
    <div class="modal fade" id="modal-primary" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Generate Token</h4>
                </div>
                <form method="POST" id="otp_form">
                    <div class="modal-body">
                        <div class="message" id="message"></div>
                        <p class="text-danger">* Please verify number to generate token *</p>
                        <?php
                        $result = $conn->query("SELECT  user_id,mobile FROM users where user_id= 78");
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $dummy = $row["user_id"];
                                $phone = $row["mobile"];
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                        <div class="mymargin">
                            <label for="mobile">Phone number: </label>
                            <select name="mobile" id="mobile" class="form-control">
                                <option value="" selected>Choose</option>
                                <option value="<?= $phone ?>"><?= $phone ?></option>
                            </select>
                        </div>
                        <input type="hidden" name="oil_report_id" class="form-control oil_report_id" value="">

                        <div class="otpinput pt-2" id="otpinput" hidden>
                            <input type="text" id="mobileOtp" class="form-control" name="mobileOtp"
                                   placeholder="Enter Your OTP">
                        </div>

                        <div class="row pt-3">
                            <div class="col-3">
                                <div id="sendotp">
                                    <input type="button" class="btn btn-info btnSubmit" name="sendotp" value="Send OTP">
                                </div>
                                <div class="otpbtn" id="otpbtn" hidden>
                                    <input id="verify" type="button" class="btn btn-success btnVerify" name="verify"
                                           value="Verify">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="resendotpdiv" id="resendotpdiv" hidden>
                                    <input id="resendotp" type="button" class="btn btn-secondary resendotpBtn"
                                           name="resendotp" value="Resend OTP">
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="button" id="close_cancel" class="btn btn-danger" style="float: right;"
                                       value="Cancel/Close" data-dismiss="modal" aria-label="Close"
                                       onclick="clearmodaldata()">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


</div>
<?php
include("../includes/footer.php");
?>
</body>

<!-- SweetAlert2 -->
<script src="<?= URL_ASSETS ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= URL_ASSETS ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    function clearmodaldata() {
        document.getElementById("otpinput").hidden = true;
        document.getElementById("otpbtn").hidden = true;
        document.getElementById("resendotpdiv").hidden = true;
        document.getElementById("sendotp").hidden = false;
        document.getElementById("message").hidden = true;

        //reset OTP input Field
        $('#mobileOtp').val('');
        $('#mobileOtp').attr('placeholder', 'Enter Your OTP');

        $('#mobile').removeAttr('readonly disabled');
    }

    $(function () {

        $(document.body).on('hidden.bs.modal', function () {
            $('#myModal').removeData('bs.modal')
        });

        function sendotp() {
            var mnum = $('#mobile').val();
            // if (mnum.length == 10 && mnum != null) {
            var input = {
                "mobile_number": mnum,
                "action": "sendotp"
            };
            $.ajax({
                url: 'token.php',
                type: 'POST',
                data: input,
                dataType: 'json',
                success: function (response) {
                    if (response.success != 0) {
                        document.getElementById("sendotp").hidden = true;
                        $(".otpbtn").removeAttr('hidden');
                        $(".otpinput").removeAttr('hidden');
                        $(".message").removeAttr('hidden');
                        $(".resendotpdiv").removeAttr('hidden');
                        $("#mobile").attr({
                            readonly: true,
                            disabled: true
                        });
                        $(".message").html('<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                            response.msg + ' <b>' + response.otp + '</b>' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span></button></div>');
                    } else {
                        $(".message").html(response.msg);
                    }

                }
            });
        }

        $(document).on('click', '.btnSubmit', function () {
            sendotp();
        });

        $(document).on('click', '.resendotpBtn', function () {
            sendotp();
        });

        $(document).on('click', '.btnVerify', function () {
            var mnum = $('#mobileOtp').val();
            var oil_report_id = $(".oil_report_id").val();
            console.log(oil_report_id);
            var input = {
                "otp_check": mnum,
                "action": "verify",
                "oil_report_id": oil_report_id
            };

            $.ajax({
                url: 'token.php',
                type: 'POST',
                data: input,
                dataType: 'json',
                success: function (response) {
                    if (response.success == 1) {
                        document.getElementById("sendotp").hidden = true;
                        document.getElementById("resendotpdiv").hidden = true;
                        document.getElementById("otpbtn").hidden = true;
                        $(".otpinput").removeAttr('hidden');
                        $(".resendotpdiv").attr("hidden", true);
                        $(".message").html('<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                            response.msg +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span></button></div>');

                    } else if (response.success == 2) {
                        document.getElementById("mobileOtp").hidden = true;
                        document.getElementById("sendotp").hidden = false;
                        document.getElementsByClassName("otpinput").hidden = true;
                        document.getElementById("otpbtn").hidden = true;
                        document.getElementsByClassName("message").hidden = true;
                        document.getElementsByClassName("resendotpdiv").hidden = true;
                        $('#mobile').removeAttr('readonly disabled');


                        $('#mobile').val('');
                        $('#mobile').attr('placeholder', 'Enter the 10 digit mobile');
                        $(".message").html(response.msg);
                    } else {
                        $(".message").html(response.msg);
                    }
                }
            });
        })


    });
</script>


<script>
    $(document).ready(function () {
        var Toast = Swal.mixin({});

        //initializing datatables with ajax call
        var oiltable = $('#example2').DataTable({
            "ordering": false,
            "paging": true,
            "info": false,
            "searching": true,
            "autoWidth": false,
            "language": {
                searchPlaceholder: "By All Data"
            },
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: "query_oil_token.php",
                type: "POST"
            },
            "columnDefs": [{
                "orderable": false,
            }
                // {
                //   'visible':false,
                //   'targets':[0]
                // }
            ]
        });

        //fetch data in modal-body
        $(document).on('click', '.fetch_oil_id', function () {
            var my_id_value = $(this).data('id');
            $(".oil_report_id").val(my_id_value);
        });

        $(document).on('click', '.save_change', function () {
            var officer_oil_id = $(".officer_oil_id").val();
            //  alert(officer_oil_id);
            var form = $("#oil_update_form");
            if (!form.valid()) {
                //return false;
            }
            var param = form.serialize();
            console.log(param);
            $.ajax({
                url: 'update_oil.php',
                method: "POST",
                data: param,
                enctype: 'multipart/form-data',
                success: function (datalist) {
                    datalist = datalist.replace(/^\s+|\s+$/g, '');
                    console.log(datalist);
                    Toast.fire({
                        icon: 'success',
                        title: datalist
                    })
                }

            }); //end of modal-body
        });


//update reject update
        $(document).on('click', '.reject_request', function () {
            //console.log('hello');
            var table = $(this).data('report_id');
            var trid = $(this).closest('tr').attr('report_id');
            // console.log(selectedRow);
            var id = $(this).val('report_id');

            console.log("reject");
        });


//end of reject update


    });


</script>


<script>
    //getiing only integer value in input field

    function onlynumberfield() {
        var digitPeriodRegExp = new RegExp('^[0-9]*$');
        /*
     * Line A: Don't do anything if the Control or Alt keys are pressed down,
     * as we don't want to prevent the user from using keyboard shortcuts.
     * 
     * Line B: Make sure we're only handling strings, as those are the only
     * type of value that we are expecting.
     *
     * Line C: We only need to filter out single characters. This is important
     * because it allows us to continue using keys such as Home, End, and
     * Enter, all of which are useful for maneuvering the form, and all of which
     * are longer than 1 character.
     */
        if (event.ctrlKey // (A)
            || event.altKey // (A)
            || typeof event.key !== 'string' // (B)
            || event.key.length !== 1) { // (C)
            return;
        }

        if (!digitPeriodRegExp.test(event.key)) {
            //console.log(1);
            event.preventDefault();
        }
    }

    $(function () {

        var mobile = document.getElementById('mobile');
        var mobileOtp = document.getElementById('mobileOtp');

        mobile.addEventListener('keydown', function (event) {
            onlynumberfield();
        }, false);

        mobileOtp.addEventListener('keydown', function (event) {
            onlynumberfield();
        }, false);

    });

</script>


</html>