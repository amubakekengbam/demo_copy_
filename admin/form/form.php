<?php
// include('../includes/authentication.php');
// include('../includes/sidebar.php');
include('../includes/topbar.php');
include('../includes/header.php');   

?>
<!-- Modal -->
<div class="modal fade" id="#vehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vehicle </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    .....
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>



<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Form Category
                            <a href="oil.php" class="btn btn-primary float-right">ADD</a>
                        </h4>
                    </div>
                    <div class="card-body">
                      
                    <h4>
                            To
                        </h4>

                        <h5> The Deputy Registrar(Judl),
                            Hight court of manipur,
                            Mantripukhri,Imphal
                        </h5>
                        <p> Subject: Request for issue of ________________
                            liters of _____.
                        </p>
                        <h5>sir</h5>
                        <p> I have the honour to request you kindly to issue. __________ for the Vehicle/Generator of
                            this Registry bearing
                            No.MN ___________ for official duty of the Hon'ble Mr _____________________.
                            Detail of Fuel consumption and Mileometer/Odometer readings at present (along with the
                            previous one) are as shown.
                        </p>
                        <p> Mileometer/Odometer reading(in Kilometers)
                            present :__________________________
                            previous:_____________________
                            covered:

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<?php

include("../includes/footer.php");
?>