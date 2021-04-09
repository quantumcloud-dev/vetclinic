<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
        $pet_type= $_POST['pet_type'];
        $pet_breed= $_POST['pet_breed'];

		try{
			$stmt = $conn->prepare("UPDATE category SET 
			pet_type=:pet_type,pet_breed=:pet_breed WHERE id=:id");

			$stmt->execute(['pet_type'=>$pet_type,'pet_breed'=>$pet_breed, 'id'=>$id]);

			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>