<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id=:product_id");
		$stmt->execute(['product_id'=>$id]);
		$row = $stmt->fetch();
		
		// $pdo->close();

		echo json_encode($row);
	}
?>