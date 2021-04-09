<!-- Adding new pet-->
<div class="modal fade" id="addnewpet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i><b>Adding New Pet...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pet_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Pet Name:</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="petname" name="pet_name" placeholder="Type your pet name here. (optional)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Class:</label>
                   
                    <div class="col-sm-6">
                      <select name="pet_class" style="height:1.5em; width:50%;">
                        <option></option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                        <option value="Snake">Snake</option>
                      </select>
                      <!-- <input type="text" class="form-control" id="class" name="pet_class" required> -->
                    </div>
                  
                     
                
                </div>
                <div class="form-group">
                    <label for="breed" class="col-sm-3 control-label">Breed:</label>

                    <div class="col-sm-6">
                      <input type="text" 
                      class="form-control" 
                      id="breed" 
                      name="pet_breed"  
                      placeholder="Ex. Chihuahua (required)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="weight" class="col-sm-3 control-label">Weight:</label>

                    <div class="col-sm-6">
                      <input type="text" 
                      class="form-control" 
                      id="weight" name="pet_weight" placeholder="Ex. 10kg">
                    </div>
                </div>
                <div class="form-group">
                    <label for="temperature" class="col-sm-3 control-label">Temperature:</label>

                    <div class="col-sm-6">
                      <input type="text" 
                      class="form-control" 
                      id="temperature" name="pet_temp" placeholder="Ex. 33">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="vaccine_history" class="col-sm-3 control-label">Vaccine History</label>

                    <div class="col-sm-6">
                      <input type="date" class="form-control" id="vaccine_history" name="pet_vaccine_history">
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-6">
                      <input type="file" id="addphoto" name="pet_photo">
                    </div>
                </div>
                <input type="hidden" name = "owner_id" value = "<?php echo $session_id; ?>">
            </div><!--/modal-body-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add">
                <i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Adding new pet-->

<!-- Editing pet -->
<div class="modal fade" id="editPet"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
                  <i><h4 class="modal-title"><b>Editing *** </b><strong><b class="pname"></b> ***</strong></h4></i>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pet_edit.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Pet Name:</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pname" name="pet_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Class</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pclass" name="pet_class" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="breed" class="col-sm-3 control-label">Breed</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pbreed" name="pet_breed" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="weight" class="col-sm-3 control-label">Weight</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pweight" name="pet_weight">
                    </div>
                </div>
                <div class="form-group">
                    <label for="temperature" class="col-sm-3 control-label">Temperature</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="ptemperature" name="pet_temp">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="vaccine_history" class="col-sm-3 control-label">Vaccine History</label>

                    <div class="col-sm-6">
                      <input type="date" class="form-control" id="pvaccine_history" name="pet_vaccine_history">
                    </div>
                </div> -->
          
                <input type="hidden" class="petid" name="id">
                <!-- <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="pet_photo">
                    </div>
                </div> -->
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

<!-- Deleting pet -->
<div class="modal fade" id="deletePet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
                  <i><h4 class="modal-title"><b>Deleting...</i>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="pet_delete.php">
                    <div class="text-center">
                      <h4>Are you sure you want to delete: </h4>
                      <h4 class="col-sm-4">Pet Name: <a><i class="bold pname"></i></a></h4>
                      <h4 class="col-sm-4">Class: <a><i class="bold pclass"></i></a></h4>
                      <h4 class="col-sm-4">Breed: <a><i class="bold pbreed"></i></a></h4>
                    </div>
                    <input type="hidden" class="petid" name="id"> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                      <button type="submit" class="btn btn-danger btn-flat" name="delete">
                        <i class="fa fa-trash"></i> Delete</button>
                    </div>
                </form>
            </div><!--/modal-body-->
        </div>
    </div>
</div><!-- /Deleting pet -->

<!-- Updating pet Photo -->
<div class="modal fade" id="editPhoto">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <h4 class="modal-title"><i><b>Updating <b class="pname"></b>`s Photo...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pet_edit.php" enctype="multipart/form-data">
                <input type="hidden" class="petid" name="id">
                <div class="form-group">
                
                    <div class="col-sm-12">
                      <input type="file" id="editphoto" name="pet_photo">
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

<!-- Medical History -->
<div class="modal fade" id="historyPet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gray">
              <h4 class="modal-title"><i><b class="pname"></b>`s Profile</i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal bg-gray" method="POST" action="" enctype="multipart/form-data">
                
              
                    
                    <h4 class="col-sm-6">Pet Name: <i><a class="pname" ></a></i></h4>
                    <h4 class="col-sm-6">Pet ID: <i><a class="petid" name="petid"></a></i></h4>
                    <h4 class="col-sm-6">Class: <i><a class="pclass"></a></i></h4>
                    <h4 class="col-sm-6">Breed: <i><a class="pbreed"></a></i></h4>
                    <h4 class="col-sm-12">Date of Birth: <i><a class="pbirth"></a></i></h4>
                    <h4 class="col-sm-6">Temperature: <i><a class="ptemp"></a>°C</i></h4>
                    <h4 class="col-sm-6">Kilogram: <i><a class="pweight"></a></i></h4>
                  
                  </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
              
              </form>
            </div>
        </div>
    </div>
</div><!-- /Medical History -->





     