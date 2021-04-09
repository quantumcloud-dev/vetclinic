<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM requests WHERE request_id=:request_id");
		$stmt->execute(['request_id'=>$id]);
		$row = $stmt->fetch();
		
		// $pdo->close();

		echo json_encode($row);
	}
?>