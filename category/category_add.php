
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$pet_type = $_POST['pet_type'];
        $pet_breed = $_POST['pet_breed'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE pet_breed=:pet_breed");
		$stmt->execute(['pet_breed'=>$pet_breed]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Breed already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO category 
				(pet_type,pet_breed) 
				VALUES 
				(:pet_type,:pet_breed)");

				$stmt->execute(['pet_type'=>$pet_type,'pet_breed'=>$pet_breed]);
				
				$_SESSION['success'] = 'Category added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up category form first';
	}

	header('location: category.php');

?>