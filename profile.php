<?php include 'includes/session.php'; ?>
<?php
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
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12 col-md-6 col-lg-6">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
							<div class='alert alert-success alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert' 
							aria-hidden='true'>&times;</button>

							<h4><i class='icon fa fa-check'></i> Success!</h4>
							".$_SESSION['success']."
						  </div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="box-body text-center">
						<h3><i>My Profile</i></h3>
	        				<div class="col-sm-12 text-center">
								<img src="<?php echo (!empty($user['photo'])) 
								? 'images/'.$user['photo'] 
								: 'images/profile.jpg'; ?>" style="width:100px; height:100%">
	        				</div>
	        				<div class="col-sm-12">
	        					<div class="row">
								
								<hr>
								
	        						<div class="col-sm-12">
	        							<h4>Name: <i><a><?php echo $user['firstname'].' '.$user['middlename'].' '.$user['lastname']; ?></a></i></h4>
	        							<h4>Email: <i><a><?php echo $user['email']; ?></a></i></h4>
										<h4>Contact Info: <i><a><?php echo (!empty($user['contact_info'])) 
										? $user['contact_info'] : 'N/a'; ?></a></i></h4>
										<h4>Address: <i><a><?php echo (!empty($user['address'])) 
										? $user['address'] : 'N/a'; ?></a></i></h4>
	        							<h4>Account Created: <i><a><?php echo date('M d, Y', strtotime($user['created_on'])); ?></a></i></h4>
										<a href="#profile" class="btn btn-success btn-flat" data-toggle="modal">
											<i class="fa fa-edit"></i> Edit</a>
	        						</div>

	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		
	        	</div>
	        	<!-- <div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div> -->
	        </div>
		
						
													  
	   </div><!--/col-12-->
  </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'profile_modal.php'; ?>
	
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>