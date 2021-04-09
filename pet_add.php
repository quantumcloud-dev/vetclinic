
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$pet_name = $_POST['pet_name'];
        $pet_class = $_POST['pet_class'];
        $pet_breed = $_POST['pet_breed'];
        $pet_weight = $_POST['pet_weight'];
        $pet_temp = $_POST['pet_temp'];
        $pet_vaccine_history = $_POST['pet_vaccine_history'];
		$session_id = $_POST['owner_id'];

		$conn = $pdo->open();

            $filename = $_FILES['pet_photo']['name'];
			if(!empty($filename)){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);
                
			}
			try{
				$stmt = $conn->prepare("INSERT INTO pets 
				(owner_id,pet_name,pet_class,pet_breed,pet_weight,
				pet_temp,pet_vaccine_history,pet_photo)
                VALUES 
				(:owner_id,:pet_name,:pet_class,:pet_breed,:pet_weight,
				:pet_temp,:pet_vaccine_history,:pet_photo)");
				 
				$stmt->execute(['owner_id'=>$session_id,'pet_name'=>$pet_name,
				'pet_class'=>$pet_class,'pet_breed'=>$pet_breed,
                'pet_weight'=>$pet_weight,'pet_temp'=>$pet_temp,
                'pet_vaccine_history'=>$pet_vaccine_history,'pet_photo'=>$filename]);

				$_SESSION['petSuccess'] = 'Pet added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up category form first';
	}

	header('location: pet_profile.php');

?>