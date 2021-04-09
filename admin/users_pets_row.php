<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM pets WHERE owner_id=:owner_id");
		$stmt->execute(['owner_id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>