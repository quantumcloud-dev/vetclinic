<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		// $stmt = $conn->prepare("SELECT * FROM documentations WHERE id=:id");
		$stmt = $conn->prepare("SELECT pet_weight,pet_temp FROM pets 
		FULL OUTER JOIN documentations
		on 
        pets.id = documentations.pet_id WHERE id=:id");
		$stmt->execute(['id'=>$id]);

		$row = $stmt->fetch();
		
		// $pdo->close();

		echo json_encode($row);
	}
?>