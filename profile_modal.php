<!-- Edit Profile -->
<!-- Add -->
<style>
  .form-control{
    text-align:center;
  }
</style>
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header bg-green">
            	<h3 class="modal-title text-center"><i>My Profile</i></h3>
          	</div>
          	<div class="modal-body bg-gray">
            	<form class="form-horizontal" method="POST" action="profile_edit.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="col-sm-12 text-center user-image">
                    <img src="<?php echo (!empty($user['photo'])) 
                    ? 'images/'.$user['photo'] 
                    : 'images/profile.jpg'; ?>" width="150px" height="auto">
                  </div>
                </div>
                <hr>
                
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="firstname" name="firstname" 
                      value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Middlename:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="middlename" name="middlename" 
                      value="<?php echo $user['middlename']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="lastname" name="lastname" 
                      value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Birthdate:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="birthdate" name="birthdate" 
                      value="<?php echo (!empty($user['birthdate'])) 
										? $user['birthdate'] : 'N/a'; ?>">
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Contact:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="contact" name="contact" 
                      value="<?php echo (!empty($user['contact_info'])) 
										? $user['contact_info'] : 'N/a'; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Address:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="address" name="address" 
                      value="<?php echo (!empty($user['address'])) 
										? $user['address'] : 'N/a'; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-6">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email:</label>

                  	<div class="col-sm-6">
                    	<input type="text" class="form-control" id="email" name="email" 
                      value="<?php echo $user['email']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>

                    <div class="col-sm-6"> 
                      <input type="password" class="form-control" id="password" name="password" 
                      value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="curr_password" 
                      name="curr_password" placeholder="Enter current password to save." required>
                    </div>
                </div>
          	    </div>
          	    <div class="modal-footer">
            	  <button type="button" class="btn btn-default btn-flat" 
                  data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>

            	  <button type="submit" class="btn btn-success btn-flat" name="save">
                <i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- View all photos -->
  <div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"  style="background-color:darkviolet; color:white;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Photos</b></h4>
            </div>
            <?php
              include 'dbcon.php';
              include 'session.php';
							$query = $conn->query("select * from pets where owner_id='$session_id'");
							while($row = $query->fetch()){
							$id = $row['id'];	
			
							?>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pet_delete.php" enctype="multipart/form-data">
      
            <div class="modal-footer">
            <img class="photo" src="images/<?php echo $row['pet_photo']; ?>" width="100%">
            <h3><?php echo $row['pet_breed']; ?></h3>
              <!-- <a href="pet_delete.php<?php echo '?id='.$id; ?>" type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i>Delete?</a>
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button> -->
             
         
              </form>
            </div>
       
        </div>
        <?php } ?>
    </div>

