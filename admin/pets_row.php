<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM pets WHERE id=:id");
		// $stmt = $conn->prepare("SELECT * FROM pets 
		// RIGHT JOIN documentations
		// on pets.id = documentations.pet_id WHERE id=:id");
		$stmt->execute(['id'=>$id]);

		$row = $stmt->fetch();
		
		// $pdo->close();

		echo json_encode($row);
	}
?>