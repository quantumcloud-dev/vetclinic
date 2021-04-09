<?php
	include 'includes/session.php';

	if(isset($_POST['appointment_delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM requests WHERE request_id=:request_id");
			$stmt->execute(['request_id'=>$id]);

			$_SESSION['appDeleteSuccess'] = 'Appointment Canceled.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: services.php');
	
?>