<!-- View Concern -->
<div class="modal fade" id="viewConcern">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><b><i class="reqStatus"></i>...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="clientRequest.php">

                <div class="text-center">
                
                    <h4>Request ID: <i><a class="id" name="id"></a></i></h4>
                 
                    <h4>Concern: <i><a class="reqConcern"></i></a></h4>
                   
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
             
              </form>
            </div>
        </div>
    </div>
</div><!-- /View Concern -->

<!-- Accept appointment -->
<div class="modal fade" id="acceptAppointment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <h4 class="modal-title"><b class="bg-green"><i> Accepting... </i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="clientRequest.php">

                <input type="hidden" class="reqId" name="id">
                <input type="hidden" class="ownerID" name="owner_ID">
                <input type="hidden" class="petID" name="pet_ID">
                <input type="hidden" class="petBreed" name="pet_Breed">
                <input type="hidden" class="reqType" name="req_Type">
                <input type="hidden" class="appType" name="app_Type">
                <input type="hidden" class="vacType" name="vac_Type">
         
                   
                <div class="text-center">
                    <h4> <p>Are you sure you want to accept the appointment?</p></h4>
                    <h4>Request ID: <i><a class="id" name="id"></a></i></h4>
                    <h4>Request Status: <i><a class="reqStatus"></i></a></h4>
                    <h4>Concern: <i><a class="reqConcern"></i></a></h4>
                   
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-success btn-flat" name="appointment_accept">
                <i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Accept appointment -->

<!-- Reject appointment -->
<div class="modal fade" id="rejectAppointment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title"><b class="bg-red"><i> Rejecting... </i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="clientRequest.php">

              <input type="hidden" class="reqId" name="id">
                <input type="hidden" class="ownerID" name="owner_ID">
                <input type="hidden" class="petID" name="pet_ID">
                <input type="hidden" class="petBreed" name="pet_Breed">
                <input type="hidden" class="reqType" name="req_Type">
                <input type="hidden" class="appType" name="app_Type">
                <input type="hidden" class="vacType" name="vac_Type">

                <div class="text-center">
                    <h4> <p>Are you sure you want to reject the appointment?</p></h4>

                    <h4>Request ID: <i><a class="id"></i></a></h4>
                    <h4>Request Status: <i><a class="reqStatus"></i></a></h4>
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-danger btn-flat" name="appointment_reject">
                <i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Reject appointment -->

<!-- Delete appointment -->
<div class="modal fade" id="deleteAppointment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title"><b class="bg-red"><i> Deleting... </i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="client_tag.php">

              <input type="hidden" class="reqId" name="id">
                <input type="hidden" class="ownerID" name="owner_ID">
                <input type="hidden" class="petID" name="pet_ID">
                <input type="hidden" class="petBreed" name="pet_Breed">
                <input type="hidden" class="reqType" name="req_Type">
                <input type="hidden" class="appType" name="app_Type">
                <input type="hidden" class="vacType" name="vac_Type">

                <div class="text-center">
                    <h4> <p>Are you sure you want to delete the appointment?</p></h4>

                    <h4>Request ID: <i><a class="id"></i></a></h4>
                    <h4>Request Status: <i><a class="reqStatus"></i></a></h4>
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-danger btn-flat" name="appointment_delete">
                <i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Delete appointment -->

<!-- Tag Show -->
<div class="modal fade" id="tagShow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><b class="bg-blue"><i> Tagging... </i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="client_tag.php">

              <input type="hidden" class="reqId" name="id">
                <input type="hidden" class="ownerID" name="owner_ID">
                <input type="hidden" class="petID" name="pet_ID">
                <input type="hidden" class="petBreed" name="pet_Breed">
                <input type="hidden" class="reqType" name="req_Type">
                <input type="hidden" class="appType" name="app_Type">
                <input type="hidden" class="vacType" name="vac_Type">

                <div class="text-center">
                    <h4> <p>Are you sure you want to tag the appointment as<a> Show</a>?</p></h4>

                    <h4>Request ID: <i><a class="id"></i></a></h4>
                    <h4>Request Status: <i><a class="reqStatus"></i></a></h4>
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-primary btn-flat" name="appointment_show">
                <i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Tag Show -->

<!-- Tag No Show -->
<div class="modal fade" id="tagnoShow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title"><b class="bg-red"><i> Tagging... </i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="client_tag.php">

              <input type="hidden" class="reqId" name="id">
                <input type="hidden" class="ownerID" name="owner_ID">
                <input type="hidden" class="petID" name="pet_ID">
                <input type="hidden" class="petBreed" name="pet_Breed">
                <input type="hidden" class="reqType" name="req_Type">
                <input type="hidden" class="appType" name="app_Type">
                <input type="hidden" class="vacType" name="vac_Type">

                <div class="text-center">
                    <h4> <p>Are you sure you want to tag the appointment as<a> No-Show</a>?</p></h4>

                    <h4>Request ID: <i><a class="id"></i></a></h4>
                    <h4>Request Status: <i><a class="reqStatus"></i></a></h4>
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-danger btn-flat" name="appointment_noShow">
                <i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Tag No Show -->