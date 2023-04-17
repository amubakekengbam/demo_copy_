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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<?php

include("../includes/footer.php");
?>