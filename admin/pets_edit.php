<?php
	include 'includes/session.php';

	if(isset($_POST['editP'])){
		$id = $_POST['id'];
		
        $pet_weight = $_POST['pet_weight'];
        $pet_temp = $_POST['pet_temp'];
	
		try{
			$stmt = $conn->prepare("UPDATE pets SET pet_weight=:pet_weight, pet_temp=:pet_temp
			WHERE id = :id");

            $stmt->execute(['pet_weight'=>$pet_weight,'pet_temp'=>$pet_temp, 'id'=>$id]);
			
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
		$pet_id = $_POST['petID'];
		$owner_id = $_POST['ownerID']; 
		$pet_note = $_POST['addNote'];

		$conn = $pdo->open();

        $filename = $_FILES['diag_photo']['name'];
			if(!empty($filename)){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);
                
			}
			try{
				$stmt = $conn->prepare
				("INSERT INTO diagnosis 
				(pet_id,owner_id,
				photo,pet_note)
                VALUES 
				(:pet_id,:owner_id,
				:photo,:pet_note)");

                $stmt->execute
				(['pet_id'=>$pet_id,'owner_id'=>$owner_id,
				'photo'=>$filename,'pet_note'=>$pet_note]);

				$_SESSION['noteSuccess'] = 'Diagnosis added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
    }

	header('location: pets.php');

?>