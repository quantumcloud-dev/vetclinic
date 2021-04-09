<!-- Adding new Doctor-->
<div class="modal fade" id="addDoctor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i><b>Adding New Doctor...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="adminFunction.php" enctype="multipart/form-data">
                <div class="form-group has-feedback col-sm-12">
                <label for="firstname" class="control-label">Firstname:</label>

                  <input type="text" class="form-control" name="firstname" 
                    placeholder="Firstname*" 
                    required>
                  
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="middlename" class="control-label">Middlename:</label>
                  <input type="text" class="form-control" name="middlename" 
                    placeholder="Middlename (Optional)">
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="lastname" class="control-label">Lastname:</label>
                  <input type="text" class="form-control" name="lastname" 
                    placeholder="Lastname*" 
                      required>
                </div>

                <div class="form-group has-feedback col-sm-12">
                <label for="birthdate" class="control-label">Date of Birth:</label>
                  <input type="date" class="form-control" name="birthdate" 
                    placeholder="Date of Birth">
                  
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="address" class="control-label">Address:</label>
                  <input type="text" class="form-control" name="address" 
                    placeholder="Address (Required)" required>
                  
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="contact" class="control-label">Contact #:</label>
                  <input type="text" class="form-control" name="contact" 
                    placeholder="Contact Number (Optional)">
                  
                </div>

                <div class="form-group has-feedback col-sm-12">
                <label for="email" class="control-label">Email Address:</label>
                  <input type="email" class="form-control" 
                  name="email" placeholder="Enter Email as Username. Valid Email:(Optional)" required>
                
                </div>
                <div class="form-group has-feedback col-sm-6">
                <label for="password" class="control-label">Password:</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                
                </div>
                <div class="form-group has-feedback col-sm-6">
                <label for="repasword" class="control-label">Confirm Password:</label>
                  <input type="password" class="form-control" name="repassword" placeholder="Confirm Password" required>
                
                </div>
              
                      
                  </div><!--/modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                      <i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add">
                      <i class="fa fa-plus"></i> Add</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Adding new Doctor-->

<!-- Adding new Doctor-->
<div class="modal fade" id="editDoctor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <h4 class="modal-title"><i><b>Editing *</b><stong class="fullname"></strong></i>`s info...</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="adminFunction.php" enctype="multipart/form-data">
                <div class="form-group has-feedback col-sm-12">
                <label for="firstname" class="control-label">Firstname:</label>

                  <input type="text" class="form-control firstname" name="firstname" 
                    placeholder="Firstname*" 
                    required>
                  
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="middlename" class="control-label">Middlename:</label>
                  <input type="text" class="form-control middlename" name="middlename" 
                    placeholder="Middlename">
                </div>

                <div class="form-group has-feedback col-sm-6">
                <label for="lastname" class="control-label">Lastname:</label>
                  <input type="text" class="form-control lastname" name="lastname" 
                    placeholder="Lastname*" 
                      required>
                </div>

                <div class="form-group has-feedback col-sm-12">
                <label for="birthdate" class="control-label">Date of Birth:</label>
                  <input type="date" class="form-control birthdate" name="birthdate" 
                    placeholder="Date of Birth" disabled>
                  
                </div>

                <div class="form-group has-feedback col-sm-12">
                <label for="address" class="control-label">Address:</label>
                  <input type="text" class="form-control address" name="address" 
                    placeholder="Address">
                  
                </div>

                <div class="form-group has-feedback col-sm-12">
                <label for="contact" class="control-label">Contact #:</label>
                  <input type="text" class="form-control contact" name="contact" 
                    placeholder="Contact Number">
                  
                </div>

                <input type="hidden" class="id" name="userID">
              
                      
                  </div><!--/modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                      <i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success btn-flat" name="edit">
                      <i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Adding new Doctor-->

<!-- Removing Doctor -->
<div class="modal fade" id="deleteDoctor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
                  <i><h4 class="modal-title"><b>Removing...</i>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="adminFunction.php">
                    <div class="text-center">
                      <h4>Are you sure you want to Remove <a><i class="bold fullname"></i></a>? </h4>
                   
                    </div>
                    <input type="hidden" class="id" name="userID"> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> No</button>
                      <button type="submit" class="btn btn-danger btn-flat" name="delete">
                        <i class="fa fa-trash"></i> Yes</button>
                    </div>
                </form>
            </div><!--/modal-body-->
        </div>
    </div>
</div><!-- /Removing Doctor -->