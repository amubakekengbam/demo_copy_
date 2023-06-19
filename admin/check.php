<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");





?>

<head>
    <title>TOKEN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body> 
    <style>
    .mymargin {
        margin-top: 10px;
    }
    </style>
      
                    <center>
                        <h1 class="form-heading">Verify Number Via OTP and Generate Token</h1>
                        <div class="alert alert-danger message" hidden>
                        </div>

                        <form class="col-md-6" style="margin-top:50px">
                            <!--                
                <div class="mymargin">
                    <input type="text" id="mobile" class="form-control" placeholder="Enter the 10 digit mobile" maxlength="10">
                </div> -->
                            <?php
                        $result = $conn->query("SELECT  user_id,mobile FROM users where user_id= 78");
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                            $dummy = $row["user_id"];
                            $phone= $row["mobile"];
                          }
                        } else {
                          echo "0 results";
                        }

                        ?>

                            <div class="mymargin'>
                              <label for=" subject">phone number: </label>
                                <select name="officer_id" id="mobile" class="form-control">
                                    <option value="" selected>Choose</option>
                                    <option value="<?= $phone ?>"><?= $phone?></option>
                                </select>
                            </div>
                            <div class="mymargin otpinput" id="otpinput" hidden>
                                <input type="text" id="mobileOtp" class="form-control" placeholder="Enter the OTP">
                            </div>

                            <div class="mymargin otpbtn" id="otpbtn" hidden>
                                <input id="verify" type="button" class="btn btn-lg btn-success btnVerify" name="verify"
                                    value="Verify">
                            </div>

                            <div class="mymargin resendotpdiv" id="resendotpdiv" hidden>
                                <input id="resendotp" type="button" class="btn btn-lg btn-primary resendotpBtn"
                                    name="resendotp" value="Resend OTP">
                            </div>

                            <div class="pt-3">
                                <input type="button" class="btn btn-lg btn-info btnSubmit mymargin" id="sendotp"
                                    name="sendotp" value="Send OTP">
                            </div>
                        </form>
              </center>
</div>
</body>

<script>
$(function() {
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
            success: function(response) {
                if (response.success != 0) {
                    document.getElementById("sendotp").hidden = true;
                    document.getElementById("otpinput").hidden = false;
                    $(".otpbtn").removeAttr('hidden');
                    $(".otpinput").removeAttr('hidden');
                    $(".message").removeAttr('hidden');
                    $(".resendotpdiv").removeAttr('hidden');

                    $("#mobile").attr({
                        readonly: true,
                        disabled: true
                    });
                    $(".message").html(response.msg + "OTP is : <b>" + response.otp + "</b>");
                } else {
                    $(".message").removeAttr('hidden');
                    $(".message").html(response.msg);
                }

            }
        });
    }

    $(document).on('click', '.btnSubmit', function() {
        sendotp();
    });

    $(document).on('click', '.resendotpBtn', function() {
        sendotp();
    });

    $(document).on('click', '.btnVerify', function() {
        var mnum = $('#mobileOtp').val();
        var input = {
            "otp_check": mnum,
            "action": "verify"
        };
        $.ajax({
            url: 'token.php',
            type: 'POST',
            data: input,
            dataType: 'json',
            success: function(response) {
                if (response.success == 1) {
                    document.getElementById("sendotp").hidden = true;
                    document.getElementById("resendotpdiv").hidden = true;
                    $(".otpbtn").removeAttr('hidden');
                    $(".otpinput").removeAttr('hidden');
                    $('.resendotpdiv').attr('hidden');

                    $(".message").html(response.msg + ' <b>' + response.token + '</b>');

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
        ||
        event.altKey // (A)
        ||
        typeof event.key !== 'string' // (B)
        ||
        event.key.length !== 1) { // (C)
        return;
    }

    if (!digitPeriodRegExp.test(event.key)) {
        //console.log(1);
        event.preventDefault();
    }
}

$(function() {

    var mobile = document.getElementById('mobile');
    var mobileOtp = document.getElementById('mobileOtp');

    mobile.addEventListener('keydown', function(event) {
        onlynumberfield();
    }, false);

    mobileOtp.addEventListener('keydown', function(event) {
        onlynumberfield();
    }, false);

});
</script>

</html>