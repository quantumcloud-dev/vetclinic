<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	<?php include 'session.php'; ?>
	  <div class="content-wrapper">
			<div class="container">
				<div class="content">
					<div class="col-sm-12">
						<div class="row">
              <section class="content">
                  <?php
                      if(isset($_SESSION['error'])){
                      echo "
                          <div class='alert alert-danger alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-warning'></i> Error!</h4>
                          ".$_SESSION['error']."
                          </div>
                      ";
                      unset($_SESSION['error']);
                      }
                      if(isset($_SESSION['success'])){
                      echo "
                          <div class='alert alert-success alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-check'></i> Success!</h4>
                          ".$_SESSION['success']."
                          </div>
                      ";
                      unset($_SESSION['success']);
                      }
                  ?>
                  <div class="row">
                      <div class="col-xs-12">
                      <div class="box">
                          <div class="box-header with-border">
                          <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                          </div>
                          <div class="box-body">
                          <table id="example1" class="table table-bordered">
                              <thead>
                              <th>ID</th>
                              <th>Pet Type</th>
                              <th>Breed</th>
                              <th>Tools</th>
                              </thead>
                              <tbody>
                              <?php
                                  $conn = $pdo->open();

                                  try{
                                  $stmt = $conn->prepare("SELECT * FROM category");
                                  $stmt->execute();
                                  foreach($stmt as $row){
                                      echo "
                                      <tr>
                                          <td>".$row['id']."</td>
                                          <td>".$row['pet_type']."</td>
                                          <td>".$row['pet_breed']."</td>
                                          <td>
                                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                          <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                                          </td>
                                      </tr>
                                      ";
                                  }
                                  }
                                  catch(PDOException $e){
                                  echo $e->getMessage();
                                  }

                                  $pdo->close();
                              ?>
                              </tbody>
                          </table>
                          </div>
                      </div>
                      </div>
                  </div>
              </section>
						</div>
					</div>
		    </div>
      </div>
    </div> <!-- End of content-wrapper -->
  
  	<?php include 'includes/footer.php'; ?>
</div>
<?php include 'category_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id);
      $('#edit_name').val(response.pet_type);
      $('#edit_breed').val(response.pet_breed);
      $('.catname').html(response.pet_type);
      $('.breed').html(response.pet_breed);
    }
  });
}
</script>
</body>
</html>