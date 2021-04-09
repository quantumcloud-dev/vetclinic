<?php
	include 'includes/session.php';

	if(isset($_POST['note_add'])){
		$pet_id = $_POST['petID'];
		$owner_id = $_POST['ownerID']; 
		$pet_note = $_POST['addNote'];

		$conn = $pdo->open();
  
			try{
				$stmt = $conn->prepare
				("INSERT INTO diagnosis 
				(pet_id,owner_id,pet_note)
                VALUES 
				(:pet_id,:owner_id,:pet_note)");

                $stmt->execute
				(['pet_id'=>$pet_id,'owner_id'=>$owner_id,'pet_note'=>$pet_note]);

				$_SESSION['noteSuccess'] = 'Note added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
    }
	// else{
	// 	$_SESSION['error'] = 'Fill up category form first';
	// }

	header('location: pets.php');

?>