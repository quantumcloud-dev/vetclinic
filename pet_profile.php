<?php 
	include 'includes/session.php'; 
		if(!isset($_SESSION['user'])){
			header('location: index.php');
		}
	?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'session.php'; ?>

	<?php include 'includes/navbar.php'; ?>
	<div class="content-wrapper">
		<div class="container">
			<!-- Main content -->
			<div class="row">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header with-border bg-blue">
									<i class="text-center"><h3>My Pet Photos</h3></i>
								</div>
							<div class="box-body">
						
								<?php include 'session.php';
									$conn = $pdo->open();
							
									try{
									$stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id' 
									and pet_status != 'deleted'");
									$stmt->execute();
									
									foreach($stmt as $row){
										$image = (!empty($row['pet_photo'])) ? 'images/'.$row['pet_photo'] : 'images/profile.jpg';
										echo "
										<div class='col-md-3 col-sm-4 col-xs-12 text-center'>
											<hr>
											<h5>Pet Name: <i><a>".$row['pet_name']."</a></i></h5>
											<img class='photos' src='images/".$row['pet_photo']."' width='100%' height='150'>
											<h5>Pet Class: <i><a>".$row['pet_class']."</a></i></h5>
											<h5>Pet Breed: <i><a>".$row['pet_breed']."</a></i></h5>
											<hr>
										</div>
										";
									}
									}
									catch(PDOException $e){
									echo $e->getMessage();
									}

									$pdo->close();
								?>
							</div>   
						</div><!-- /col-xs-12 -->
					</div><!-- /row -->
				</section><!-- /content -->
			</div><!--/Pet Photos-->

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
						if(isset($_SESSION['petSuccess'])){
						echo "
							<div class='alert alert-success alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<h4><i class='icon fa fa-check'></i> Success!</h4>
							".$_SESSION['petSuccess']."
							</div>
						";
						unset($_SESSION['petSuccess']);
						}
					?>
					<div class="row">
					
						<div class="col-xs-12">
						<div class="box">
							<div class="box-header with-border bg-blue text-center">
							<i><h3>My Pets</h3></i>
							
							<a href="#addnewpet" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">
							<i class="fa fa-plus"></i> Add New Pet</a></div>
							
							<div class="box-body">
							<table id="pets" class="table table-bordered table-striped bg-gray" width="100%">
							<style>
								th{
									text-align:center;
								}
								tr{
									text-align:center;
								}
							</style>
								<thead>
									<th>Pet ID</th>
									<th>Photo</th>
									<th>Pet Name</th>
									<th>Class</th>
									<th>Breed</th>
									<th>Weight</th>
									<th>Temperature</th>
									<th>Tools</th>
									</thead>
								<tbody>
								<?php
									$conn = $pdo->open();
							
									try{
									$stmt = $conn->prepare("SELECT * FROM pets where owner_id ='$session_id' 
									and pet_status != 'deleted'");
									$stmt->execute();
									
										foreach($stmt as $row){
											$image = (!empty($row['pet_photo'])) 
											? 'images/'.$row['pet_photo'] 
											: 'images/profile.jpg';
											echo "
											<tr>
												<td>".$row['id']."</td>
												<td><span class='pull-right photo'>
												<a href='#editPhoto' class='photo' data-toggle='modal'
													data-id='".$row['id']."'>
													<i class='fa fa-edit'></i></a></span>
													<img src='".$image."' height='50' width='100'>
												</td>
												<td>".$row['pet_name']."</td>												
												<td>".$row['pet_class']."</td>
												<td>".$row['pet_breed']."</td>
												<td>".$row['pet_weight']."</td>
												<td>".$row['pet_temp']."°C</td>
												<td>
												
												<button class='btn btn-success btn-sm edit btn-flat'
												 	data-id='".$row['id']."'>
													 <i class='fa fa-edit'></i> Edit</button>
												<button class='btn btn-danger btn-sm delete btn-flat' 
													data-id='".$row['id']."'>
													<i class='fa fa-trash'></i> Delete</button>
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
			</div><!--/End of My Pets-->
											   																						  
		</div><!--/col-12-->
	</div>
	     
	     
	    
	<?php 
		include 'pet_modal.php'; 
		include 'includes/footer.php';
		include 'profile_modal.php';?>

	
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

		$(document).on('click', '.delete', function(e){
			e.preventDefault();
			$('#deletePet').modal('show');
			var id = $(this).data('id');
			getRow(id);
		});

		$(document).on('click', '.photo', function(e){
			e.preventDefault();
			$('#editPhoto').modal('show');
			var id = $(this).data('id');
			getRow(id);
		});

		$(document).on('click', '.medHistory', function(e){
			e.preventDefault();
			$('#historyPet').modal('show');
			var id = $(this).data('id');
			getRow(id);
		});

	});

	function getRow(id){
		$.ajax({
			type: 'POST',
			url: 'pet_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
			$('.petid').val(response.id);
				$('#pname').val(response.pet_name);
				$('#pclass').val(response.pet_class);
				$('#pbreed').val(response.pet_breed);
				$('#pweight').val(response.pet_weight);
				$('#ptemperature').val(response.pet_temp);
				$('#pvaccine_history').val(response.pet_vaccine_history);
			
				$('.petid').html(response.id);
				$('.pname').html(response.pet_name);
				$('.pclass').html(response.pet_class);
				$('.pbreed').html(response.pet_breed);
				$('.pbirth').html(response.pet_birth);
				$('.ptemp').html(response.pet_temp);
				$('.pweight').html(response.pet_weight);

			}
		});
	}

</script>
</body>
</html>