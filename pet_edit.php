<?php
	include 'includes/session.php';

	if(isset($_POST['editP'])){
		$id = $_POST['id'];
		$pet_name = $_POST['pet_name'];
        $pet_class = $_POST['pet_class'];
        $pet_breed = $_POST['pet_breed'];
        $pet_weight = $_POST['pet_weight'];
        $pet_temp = $_POST['pet_temp'];
		$pet_vaccine_history = $_POST['pet_vaccine_history'];
		
		$filename = $_FILES['pet_photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['pet_photo']['tmp_name'], 'images/'.$filename);	
			$pet_photo = $filename;
		}
	
		try{
			$stmt = $conn->prepare("UPDATE pets SET 
			pet_name = :pet_name, pet_class = :pet_class, pet_breed = :pet_breed,
			pet_weight = :pet_weight, pet_temp = :pet_temp,
			pet_vaccine_history = :pet_vaccine_history
			WHERE id = :id");

            $stmt->execute(['pet_name'=>$pet_name,'pet_class'=>$pet_class,'pet_breed'=>$pet_breed,
            'pet_weight'=>$pet_weight,'pet_temp'=>$pet_temp,
			'pet_vaccine_history'=>$pet_vaccine_history, 'id'=>$id]);
			
			$_SESSION['petSuccess'] = 'Pet profile updated successfully.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	
		}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
	
		$filename = $_FILES['pet_photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['pet_photo']['tmp_name'], 'images/'.$filename);	
			$pet_photo = $filename;
		}
	
		try{
			$stmt = $conn->prepare("UPDATE pets SET 
			pet_photo=:pet_photo WHERE id = :id");

            $stmt->execute(['pet_photo'=>$pet_photo, 'id'=>$id]);
			
			$_SESSION['petSuccess'] = 'Pet photo updated successfully.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	
		}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: pet_profile.php');

?>