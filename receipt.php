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
					<!-- Requests -->
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">

							<!-- Appointment History -->
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-header bg-gray">
											<i><h2>Receipt</h2></i>
										</div>
										<div class="box-body">
											<table id="history" class="table table-bordered table-hover table-striped bg-gray" width="100%">
                                                <thead>
                                                    <style>
                                                        th{
                                                            text-align:center;
                                                        }
                                                    </style>
                                                    <th>Receipt Date</th>
                                                    <th>Tools</th>
                                                    <!-- <th>Tools</th> -->
                                                
                                                </thead>
												<tbody>
                                                    <?php
                                                        include("session.php");
                                                        $conn = $pdo->open();
                                                
                                                        try{
                                                        
                                                        $stmt = $conn->prepare("SELECT * FROM histories 
                                                        where owner_id ='$session_id'");
                                                        $stmt->execute();
                                                
                                                            foreach($stmt as $row){
                                                            
                                                                echo "<tr> 
                                                                        <td>".$row['date']."</td>
                                                                        <td><button href='#receipt' 
                                                                            data-id='".$row['pet_id']."' data-toggle='modal' 
                                                                            class='receipt btn btn-flat btn-xs btn-primary'>
                                                                        View Receipt</button></td>
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
              		</div><!-- Requests -->	
		        </div>
	        </div>
	    </div>
  	<?php include 'includes/footer.php'; ?>
</div>
<?php include 'receipt_modal.php';
	include 'profile_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
<script>
	$(function(){
		$(document).on('click', '.receipt', function(e){
			e.preventDefault();
			$('#receipt').modal('show');
			var id = $(this).data('id');
			getRow(id);
		});

	});

	function getRow(id){
		$.ajax({
			type: 'POST',
			url: 'receipt_row.php',
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
