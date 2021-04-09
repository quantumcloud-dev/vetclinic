<!-- Pet View -->
<div class="modal fade" id="viewPet">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h3 class="modal-title"><i><strong>Pet Profile</strong></i></h3>
          	</div>
              
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="">
                <div class='col-sm-12 bg-gray'>
                
                    <h4 class="col-sm-6">Pet Name: <i><a class="pName" ></a></i></h4>
                    <h4 class="col-sm-6">Pet ID: <i><a class="pId" name="pID"></a></i></h4>
                    <h4 class="col-sm-6">Class: <i><a class="pClass"></a></i></h4>
                    <h4 class="col-sm-6">Breed: <i><a class="pBreed"></a></i></h4>
                    <h4 class="col-sm-12">Date of Birth: <i><a class="pBirth"></a></i></h4>
                    <h4 class="col-sm-6">Temperature: <i><a class="pTemp"></a>°C</i></h4>
                    <h4 class="col-sm-6">Kilogram: <i><a class="pKilo"></a></i></h4>
                
                </div>
          	</div>
       
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        
            	</form>
          	</div>
        </div>
    </div>
</div><!-- /Pet View -->

<!-- Pet View -->
<div class="modal fade" id="addNote">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
            	<h4 class="modal-title"><i><b>Adding Note...</b></i></h4>
          	</div>
              
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="pets_note.php">
                <div class='col-sm-12 bg-gray'>
                  <div class="form-group col-sm-12">
                      <label for="">Note:</label>
                      <br>
                      <textarea name="addNote"
                      rows="5" 
                      placeholder="You can add note here. . . " style="width:100%; resize:none"></textarea>
                  </div>
                  <input type="hidden" name="petID" class="petID">
                  <input type="hidden" name="ownerID" class="ownerID">
                </div>
          	</div>
       
          	<div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm btn-flat" name="note_add"><i class="fa fa-plus"></i> Add</button>
            
        
            	</form>
          	</div>
        </div>
    </div>
</div><!-- /Pet View -->

<!-- Editing pet -->
<div class="modal fade" id="editPet"> 
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-green">
                  <i><h4 class="modal-title"><b>Editing *</b><strong><b class="pName"></b>`s info. . .</strong></h4></i>
            </div>
            <div class="modal-body text-center">
              <form class="form-horizontal" method="POST" action="pets_edit.php" enctype="multipart/form-data">

                <h4>Owner ID: <i><a class="ownerID"></a></i></h4>
                <div class="form-group">
                    <label for="weight" class="col-sm-6 control-label">Weight:</label>

                    <div class="col-sm-6">
                      <input type="text" class="pKilo form-control" id="weight" name="pet_weight" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="temperature" class="col-sm-6 control-label">Temperature:</label>

                    <div class="col-sm-6">
                      <input type="text" class="pTemp form-control" id="temperature" name="pet_temp" >
                    </div>
                </div>
               
          
                <input type="hidden" class="petID" name="id">
              
            </div><!--/modal-body-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="editP">
                <i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Editing pet -->

<!-- Uploading Diagnosis -->
<div class="modal fade" id="uploadDiagnosis">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i><b>Adding <b class="pName"></b>`s Diagnosis...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pets_edit.php" enctype="multipart/form-data">
                
              <div class='col-sm-12 bg-gray'>

                  <div class="form-group col-sm-12">
                      <label for="">Image:</label>
                      <br>
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

                    <input type="hidden" name="petID" class="petID">
                    <input type="hidden" name="ownerID" class="ownerID">
                    
                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                      <i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="upload">
                    <i class="fa fa-save"></i> Save</button>



              </form>
            </div>
        </div>
    </div>
</div><!-- /Uploading Diagnosis -->