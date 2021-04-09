<!-- Uploading Diagnosis -->
<div class="modal fade" id="uploadDiagnosis">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i><b>Uploading <b class="pName"></b>`s Diagnosis...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pets_edit.php" enctype="multipart/form-data">
                
                <input type="hidden" name="petID" class="petID">
                <input type="hidden" name="ownerID" class="ownerID">
                <div class="form-group">
                
                    <div class="col-sm-12">
                      <input type="file"name="diag_photo">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                      <label for="">Note:</label>
                      <br>
                      <textarea name="addNote"
                      rows="5" 
                      placeholder="You can add note here. . . " style="width:100%; resize:none"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-primary btn-flat" name="upload">
                <i class="fa fa-upload"></i> Upload</button>



              </form>
            </div>
        </div>
    </div>
</div><!-- /Uploading Diagnosis -->

<!-- Pet View -->
<div class="modal fade" id="editNote">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header bg-green">
            	<h4 class="modal-title"><i><b>Editing Note...</b></i></h4>
          	</div>
              
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="medicalHistory.php">
                <div class='col-sm-12 bg-gray'>
                  <div class="form-group col-sm-12">
                      <label for="">Note:</label>
                      <br>
                      <textarea class="pNote" name="note"
                      rows="5" 
                      placeholder="You can add note here. . . " style="width:100%; resize:none"></textarea>
                  </div>
                  <input type="hidden" name="id" class="id">
                </div>
          	</div>
       
          	<div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
            <button type="submit" class="btn btn-success btn-sm btn-flat" name="note_edit">
                <i class="fa fa-edit"></i> Edit</button>
            
        
            	</form>
          	</div>
        </div>
    </div>
</div><!-- /Pet View -->

<!-- Updating pet Photo -->
<div class="modal fade" id="editPhoto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <h4 class="modal-title"><i><b>Editing Photo...</b></i></h4>
            </div>
            <div class="modal-body bg-gray">
              <form class="form-horizontal" method="POST" action="medicalHistory.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                
                    <div class="col-sm-12">
                      <input type="file" id="editphoto" name="photo">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload">
                <i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Updating pet Photo -->
