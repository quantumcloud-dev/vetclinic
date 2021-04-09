<style>
    textarea{
        width:100%;
        resize:none;
    }
</style>
<div class="modal fade" id="consultation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i>Consultation</i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_add.php" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label for="">Type of Appointment?</label>
                    <select name="appType" class="form-control" required>                                           
                        <option value="Home Service" selected>Home Service</option>
                        <option value="Clinic">Clinic</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Select your pet</label>
                    <select name="petBreed" class="form-control" required>
                        <option value="" selected></option>     
                        <?php
                        include 'session.php';
                        $conn = $pdo->open();
                        try{
                        $stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id'");
                        $stmt->execute();
                     
                            foreach($stmt as $row){
                                $image = (!empty($row['pet_photo'])) 
                                ? 'images/'.$row['pet_photo'] 
                                : 'images/profile.jpg';
                                echo "
                                                                    
                                    <option value=".$row['id'].">
                                        Pet ID: ".$row['id']." **
                                        Pet Name: ".$row['pet_name']."**</option>
                                       
            
                                ";
                            }
                        }catch(PDOException $e){
                        echo $e->getMessage();
                        }

                        $pdo->close();
                    ?>
                    </select>
                    <br>
                <div class="form-group col-sm-12">
                    <label for="">Select Appointment Date</label>
                    <br>
                    <input type="date" name="consDate" required>
                </div>
                    
                </div>
                    <div class="form-group col-sm-12">
                    <label for="">Concern:</label>
                    <br>
                    <textarea name="petConcern"
                    rows="5" 
                    placeholder="You can add concern here. . . "></textarea>
                </div>  

                <input type="hidden" name = "owner_id" value = "<?php echo $session_id; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-flat bg-blue" name="consultation_add"><i class="fa fa-send"></i> Send Request</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="vaccination">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                  <h4 class="modal-title"><i>Vaccination</i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_add.php" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label for="">Type of Appointment?</label>
                    <select name="appType" class="form-control" required>                                           
                        <option value="Home Service" selected>Home Service</option>
                        <option value="Clinic">Clinic</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Type of Vaccine?</label>
                    <select name="vacType" class="form-control" required>
                        <option value="" selected></option>                                           
                        <option value="Rabbies">Rabbies</option>
                        <option value="Booster">Booster</option>
                        <option value="3 in 1 plus 1">3 in 1 plus 1</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Select your pet</label>
                    <select name="petBreed" class="form-control" required>
                        <option value="" selected></option>     
                        <?php
                        include 'session.php';
                        $conn = $pdo->open();
                   
                        try{
                        $stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id'");
                        $stmt->execute();
                        // <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal'
                        // 		 data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                        foreach($stmt as $row){
                            $image = (!empty($row['pet_photo'])) 
                            ? 'images/'.$row['pet_photo'] 
                            : 'images/profile.jpg';
                            echo "
                                                                 
                            <option value=".$row['id'].">Pet ID: ".$row['id']." **Pet Name: ".$row['pet_name']."**</option>
                           
                            ";
                            }
                        }
                       
                        catch(PDOException $e){
                        echo $e->getMessage();
                        }

                        $pdo->close();
                    ?>
                    </select>
                    
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Select Appointment Date</label>
                    <br>
                   <input type="date" name="consDate" required>
                </div>

                
                <div class="form-group col-sm-12">
                    <label for="">Concern:</label>
                    <br>
                    <textarea name="petConcern" 
                    rows="5" 
                    placeholder="You can add concern here. . . "></textarea>
                </div>

                <input type="hidden" name = "owner_id" value = "<?php echo $session_id; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                    <i class="fa fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-flat bg-blue" name="vaccination_add">
                    <i class="fa fa-send"></i>
                 Send Request
              </button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="grooming">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
             
                  <h4 class="modal-title"><i>Grooming</i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_add.php" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label for="">Type of Appointment?</label>
                    <select name="appType" class="form-control" required>                                           
                        <option value="Home Service" selected>Home Service</option>
                        <option value="Clinic">Clinic</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Select your pet</label>
                    <select name="petBreed" class="form-control" required>
                        <option value="" selected></option>     
                        <?php
                        include 'session.php';
                        $conn = $pdo->open();
                   
                        try{
                        $stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id'");
                        $stmt->execute();
                        // <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal'
                        // 		 data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                        foreach($stmt as $row){
                            $image = (!empty($row['pet_photo'])) ? 'images/'.$row['pet_photo'] : 'images/profile.jpg';
                            echo "
                                                                 
                            <option value=".$row['id'].">Pet ID: ".$row['id']." **Pet Name: ".$row['pet_name']."**</option>
                           
                          
                            ";
                        }
                        }
                       
                        catch(PDOException $e){
                        echo $e->getMessage();
                        }

                        $pdo->close();
                    ?>
                    </select>
                    
                </div>

                <div class="form-group col-sm-12">
                    <label for="">Select Appointment Date</label>
                    <br>
                   <input type="date" name="consDate" required>
                </div>

              
                <div class="form-group col-sm-12">
                    <label for="">Concern:</label>
                    <br>
                    <textarea name="petConcern" 
                    rows="5" 
                    placeholder="You can add concern here. . . "></textarea>
                </div>


                <input type="hidden" name = "owner_id" value = "<?php echo $session_id; ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-flat bg-blue" name="grooming_add"><i class="fa fa-send"></i> Send Request</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAppointment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
              <h4 class="modal-title"><b><i>Canceling...</i></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_delete.php">

                <input type="hidden" class="reqId" name="id">
                <div class="text-center">
                    <h4><p>Are you sure you want to cancel your appointment?</p></h4>
                    <h4 class="col-sm-6">Request ID: <i><a class="id"></a></i></h4>
                    <h4 class="col-sm-6">Request Status: <i><a class="reqStatus"></a></i></h4>
                    <h4 class="col-sm-6">Request Type: <i><a class="reqType"></a></i></h4>
                    <h4 class="col-sm-6">Appointment Type: <i><a class="appType"></a></i></h4>
                    <h4 class="col-sm-12">Appointmeng Date: <i><a class="reqDate"></a></i></h4>


                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-danger btn-flat" name="appointment_delete"><i class="fa fa-check"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div>