<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Category</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_add.php">

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Pet type</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="pet_type" required>
                  

                     
                    </div>
                </div>

                <div class="form-group">
                <label for="pet_breed" class="col-sm-3 control-label">Breed</label>
                    <div class="col-sm-9">                   
                      <input type="text" class="form-control" id="pet_breed" name="pet_breed" required>

                          <!-- <select name="pet_type" id="">
                    <option value="Cat" selected>Cat</option>
                    <?php 
                    $pet_type = $_POST['pet_type'];
                    $query = $conn->query("select pet_breed from category where pet_breed Like '%$pet_type%'");
                    while($row = $query->fetch()){
                        // $pet_type = $row['pet_breed'];
                        echo '<ul><li>'.$row['"pet_breed"'].'<li></ul>';
                    ?>
                    <option value="<?php echo $pet_type; ?>"><?php echo $pet_type; ?></option>
                     <?php } ?>
                    </select> -->

                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save">
                </i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Category</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_edit.php">
                <input type="hidden" class="catid" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Pet Type</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="pet_type" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_breed" class="col-sm-3 control-label">Breed</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_breed" name="pet_breed" >
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit">
                <i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_delete.php">
                <input type="hidden" class="catid" name="id">
                <div class="text-center">
                    <p>DELETE CATEGORY</p>
                    <h2 class="bold catname"></h2>
                    <h3 class="bold breed"></h3>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash">
                </i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
