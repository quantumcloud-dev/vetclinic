<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE pets SET 
			pet_status=:pet_status WHERE id = :id");

            $stmt->execute(['pet_status'=>'deleted', 'id'=>$id]);
			
			$_SESSION['petSuccess'] = 'Pet Profile deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: pet_profile.php');
	
?>