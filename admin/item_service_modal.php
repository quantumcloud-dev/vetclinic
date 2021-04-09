<style>
  select{
   
    width:100%;
    height:2em;
  }

</style>
<!-- Adding new product-->
<div class="modal fade" id="addProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
              <h4 class="modal-title"><i><b>Adding New Product...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="itemServices.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Item/Service:</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="item" name="item" placeholder="Enter Item or Service.">
                    </div>
                </div>

                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Quantity:</label>

                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
                    </div>
                </div>

                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Type:</label>

                    <div class="col-sm-6">
                      <select name="type" id="">
                        <option value="Vaccine">Vaccine</option>
                        <option value="Groom">Groom</option>
                        <option value="CBC">CBC</option>
                        <option value="BLOOD CHEM">BLOOD CHEM</option>
                      </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="breed" class="col-sm-3 control-label">Description:</label>

                    <div class="col-sm-6">
                      <textarea name="description" id="" cols="50" rows="5" style="resize:none; width:100%;"></textarea>
                    </div>
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
</div><!-- /Adding new product-->

<!-- Editing product-->
<div class="modal fade" id="editProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
              <h4 class="modal-title"><i><b>Editing Product...</b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="itemServices.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Item/Service:</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control item" id="item" name="item" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Quantity:</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control qty" id="qty" name="qty" placeholder="Enter Quantity">
                    </div>
                </div>

                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">Type:</label>

                    <div class="col-sm-6">
                      <select name="type" id="">
                        <option value="Vaccine">Vaccine</option>
                        <option value="Groom">Groom</option>
                        <option value="CBC">CBC</option>
                        <option value="BLOOD CHEM">BLOOD CHEM</option>
                      </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description:</label>

                    <div class="col-sm-6">
                      <textarea name="description" class="description" id="" cols="50" rows="5" placeholder=". . ." style="resize:none; width:100%;"></textarea>
                    </div>
                </div>

                <input type="hidden" class="prodID" name="id"> 
                
            </div><!--/modal-body-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit">
                <i class="fa fa-edit"></i> Edit</button>
              </form>
            </div>
        </div>
    </div>
</div><!-- /Edit-->

<!-- Deleting product -->
<div class="modal fade" id="deleteProduct">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-red">
                  <i><h4 class="modal-title"><b>Deleting...</i>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="itemServices.php">
                    <div class="text-center">
                      <h4>Are you sure you want to delete? </h4>
                      <h4 class="col-sm-12">Item/Service: <a><i class="bold item"></i></a></h4>
                      <h4 class="col-sm-12">Description: <a><i class="bold description"></i></a></h4>
                     
                    </div>
                    <input type="hidden" class="prodID" name="id"> 
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
</div><!-- /Deleting product -->