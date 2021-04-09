<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>

	<div class="content-wrapper">
	    <div class="container">
	      <!-- Main content -->
	        <section class="content">
	            <div class="row">
	        	    <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header with-border">
                          <h2>MEDICAL HISTORY</h2>
                        </div>
                        <div class="box-body">
                          <table id="example1" class="table table-bordered">
                            <thead>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Complaints</th>
                            <th>Vaccinations</th>
                            <th>Laboratories</th>
                            
                            
                            </thead>
                            <tbody>
                              <?php
                                  include("session.php");
                                  $conn = $pdo->open();
                          
                                  try{
                                  $stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id'");
                                  $stmt->execute();
                                  // <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal'
                                  // 		 data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                                  foreach($stmt as $row){
                                      $image = (!empty($row['pet_photo'])) 
                                      ? 'images/'.$row['pet_photo'] : 'images/profile.jpg';
                                      echo "
                                      <tr>
                                          <td>".$row['id']."</td>
                                          <td>
                                          <img src='".$image."' height='30px' width='30px'>
                                          
                                          </td>												
                                          
                                          <td>
                                          <a class='btn btn-default btn-sm' href='#edit' data-toggle='modal'> 
                                          <i class='fa fa-check'></i> Clinic Services</a>
                                         
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
	              </div><!--/col-12-->
              </div>
	        </section>
	    </div>
	  </div>
    <?php 
      include 'pet_modal.php';
      include 'includes/footer.php';
      include 'medical_history_modal.php'; 
    ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#editPet').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});
</script>
</body>
</html>