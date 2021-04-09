<?php
	include 'includes/session.php';

    if(isset($_POST['upload'])){
		$id = $_POST['id'];
        $photo = $_POST['photo'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);	
			$photo = $filename;
		}
	
		try{
			$stmt = $conn->prepare("UPDATE diagnosis SET 
			photo=:photo WHERE id=:id");

            $stmt->execute(['photo'=>$photo, 'id'=>$id]);
			
			$_SESSION['success'] = 'Image Updated successfully.';
		}
		catch(PDOException $e){
			// $_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	
		}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}

	if(isset($_POST['note_edit'])){
		$id = $_POST['id'];
        $pet_note= $_POST['note'];

		try{
			$stmt = $conn->prepare("UPDATE diagnosis SET 
			pet_note=:pet_note WHERE id=:id");

			$stmt->execute(['pet_note'=>$pet_note, 'id'=>$id]);

			$_SESSION['success'] = 'Note updated successfully';
		}
		catch(PDOException $e){
			// $_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}

   

	header('location: medical_history.php');

?>