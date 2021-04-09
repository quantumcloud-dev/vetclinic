<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; 
include 'services_modal.php' ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php include 'includes/navbar.php'; ?>
	<?php include 'session.php'; ?>
	  	<div class="content-wrapper">
			<div class="container">
				<div class="content text-center">
					<!-- History -->
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">

							<!-- Appointment History -->
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-header bg-gray">
											<i><h2>Appointment History</h2></i><a href="services.php"
											class="btn btn-primary btn-sm btn-flat">
											<i class="fa fa-plus"></i> Add Appointment</a>
										</div>
										<div class="box-body">
											<table id="history" class="table table-bordered table-hover table-striped bg-gray" width="100%">
                                                <thead>
                                                    <style>
                                                        th{
                                                            text-align:center;
                                                        }
                                                    </style>
                                                    <th>History No.</th>
                                                    <th>Status</th>
                                                    <th>Tag</th>
                                                    <th>Request Id</th>
                                                    <th>Pet Id</th>
                                                    <th>Request Type</th>
                                                    <th>Appointment Type</th>
                                                    <th>Date</th>
													<th>Tools</th>
                                                    <!-- <th>Tools</th> -->
                                                
                                                </thead>
												<tbody>
												<?php
													include("session.php");
													$conn = $pdo->open();
											
													try{
													
													$stmt = $conn->prepare("SELECT * FROM histories 
													where owner_id ='$session_id'
												");
													$stmt->execute();
											
                                                    foreach($stmt as $row){
                                                        if($row['request_status']=='Approved'){
                                                          $status = "<p class='text-center' style='color:white; background-color:green;'>
                                                          ".$row['request_status']."
                                                          </p>";
                                                        }
                                                        if($row['request_status']=='Rejected'){
                                                          $status = "<p class='text-center' style='color:white; background-color:red;'>
                                                          ".$row['request_status']."
                                                          </p>";
                                                        }
                                                        if($row['request_status']=='Deleted'){
                                                          $status = "<p class='text-center' style='color:white; background-color:red;'>
                                                          ".$row['request_status']."
                                                          </p>";
                                                        }
                                                      
                                                      echo "<tr>
                                                          <td>".$row['id']."</td>
                                                          <td>".$status."</td>
                                                          <td>".$row['tag']."</td>
                                                          <td>".$row['request_id']."</td>
                                                          <td type='submit' href='#historyPet' 
															data-id='".$row['pet_id']."' data-toggle='modal' 
															class='medHistory'>".$row['pet_id']."</td>
                                                          <td>".$row['request_type']."</td>
                                                          <td>".$row['appointment_type']."</td>
                                                          <td>".$row['date']."</td>
														  <td><button href='#historyPet' 
															data-id='".$row['pet_id']."' data-toggle='modal' 
															class='medHistory btn btn-flat btn-xs'>
														  <i class='fa fa-eye'></i> View Pet</button></td>
   
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
							</div><!-- /Appointment History -->				   
													
						</div><!--/col-12-->
              		</div><!-- History -->	
					  
					  <!--Medical History-->						
					<div class="row">	
						<section class="content">
							<div class="row">
							
								<div class="col-xs-12">
								<div class="box">
									<div class="box-header with-border bg-gray text-center">
									<i><h3>Medical History</h3></i>
								
									
									</div>
									<div class="box-body">
									<table id="petHistory" class="table table-bordered table-striped bg-gray" width="100%">
									<style>
										th{
											text-align:center
										}
										tr{
											text-align:center
										}
									</style>
										<thead>
										<th>Pet ID</th>
										<th>Request ID</th>
										
										<th>Appointment Type</th>
										<th>Request Type</th>
										<th>Status</th>
										<th>Tag</th>
										<th>Appointment Date</th>
										</thead>
										<tbody>
										<?php
											$conn = $pdo->open();
									
											try{
											$stmt = $conn->prepare("SELECT * FROM histories where owner_id ='$session_id'");
											$stmt->execute();
											
											foreach($stmt as $row){
												$image = (!empty($row['pet_photo'])) 
												? 'images/'.$row['pet_photo'] 
												: 'images/profile.jpg';
												if($row['request_status']=='Approved'){
													$status = "<p class='text-center' style='color:white; background-color:green;'>
													".$row['request_status']."
													</p>";
												}
												if($row['request_status']=='Rejected'){
													$status = "<p class='text-center' style='color:white; background-color:red;'>
													".$row['request_status']."
													</p>";
												}
												if($row['request_status']=='Deleted'){
													$status = "<p class='text-center' style='color:white; background-color:red;'>
													".$row['request_status']."
													</p>";
												}
												echo "
												<tr type='submit' href='#historyPet' 
												data-id='".$row['pet_id']."' data-toggle='modal' 
												class='medHistory'>
													<td>".$row['pet_id']."</td>
													<td>".$row['request_id']."</td>
													<td><i>".$row['appointment_type']."</i></td>
													<td><a><i>".$row['request_type']."</i></td>
													<td><i>".$status."</i></td>
													<td><a><i>".$row['tag']."</i></td>
													
													<td><a><i>".$row['date']."</a></i></td>
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
					</div><!--/End of Medical History-->			
		        </div>
	        </div>
	    </div>
  	<?php include 'includes/footer.php'; ?>
</div>
<?php include 'pet_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
<script>
	$(function(){
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
