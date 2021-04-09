<?php include 'includes/session.php';
	include 'includes/header.php'; 
	include 'services_modal.php' ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

		<?php include 'includes/navbar.php';
			include 'session.php' ?>

	  	<div class="content-wrapper">
			<div class="container">
				<div class="content text-center">


					<div class="row text-center">
						<div class="col-sm-12 col-md-12 col-lg-12">

							<!-- Messages -->
							<div class="row">
								<div class="col-xs-12">
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
									<div class="box">
										<div class="box-header bg-gray text-center">
											 <i><h2>Messages</h2></i>
										
										</div>
										<div class="box-body">
											<table id="messages" 
												class="table table-bordered table-hover table-striped bg-gray" 
												width="100%">
												<style>
													th{
														text-align:center;
													}
												</style>
                                                <thead>
												
													<th>From</th>
													<th>Message</th>
													<th>Date</th>
													<th colspan="2">Tools</th>
													
												</thead>
												<tbody>
													<?php
														$conn = $pdo->open();

														try{
														
														$stmt = $conn->prepare("SELECT * FROM messages 
														where owner_id ='$session_id' and message_status ='Sent'");
														$stmt->execute();

															foreach($stmt as $row){
																echo "
																<tr>
																	<td class='view col-sm-3' data-id='".$row['id']."'>".$row['message_from']."</td>
																	<td class='view col-sm-6' data-id='".$row['id']."'>".$row['message']."</td>
																	<td class='view col-sm-3' data-id='".$row['id']."'>".$row['date']."</td>
																	<td>
																		<button class='reply btn btn-primary btn-sm' 
																			data-id='".$row['id']."'>
																			<i class='fa fa-reply'></i> Reply
																		</button>
																		</td>
																		<td>
																		<button class='delete btn btn-danger btn-sm' 
																			data-id='".$row['id']."'>
																			<i class='fa fa-trash'></i> Delete
																		</button>
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
							</div><!-- /Messages -->				   
													
						</div><!--/col-12-->
              		</div><!--  -->										

		        </div>
	        </div>
		
	    </div>
  
  	<?php include 'includes/footer.php';?>
	<?php include 'inbox_modal.php';?>
	<?php include 'profile_modal.php';?>
	  
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

	$(document).on('click', '.reply', function(e){
    e.preventDefault();
    $('#replyMessage').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#deleteMessage').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#viewMessage').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'inbox_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){

		$('.messageID').val(response.id);
		$('.owner_ID').val(response.owner_id);
		$('.from').val(response.message_from);

		$('.from').html(response.message_from);
		$('.text').html(response.message);
		$('.date').html(response.date);
      
    }
  });
}

</script>
</body>
</html>

