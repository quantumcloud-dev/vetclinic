<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM diagnosis WHERE id=:id");
		// $stmt = $conn->prepare("SELECT notes.pet_note, pets.id 
        // from notes FULL OUTER JOIN pets 
        // ON notes.pet_id=pets.id order by notes.date DESC");

		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		// $pdo->close();

		echo json_encode($row);
	}
?>