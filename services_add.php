<?php
	include 'includes/session.php';

	if(isset($_POST['consultation_add'])){
        $pet_breed = $_POST['petBreed'];
        $laboratory = $_POST['labTest'];
        $appointmentType = $_POST['appType'];
		$session_id = $_POST['owner_id'];
        $request_date = $_POST['consDate'];
		$request_concern = $_POST['petConcern'];

		$conn = $pdo->open();

            $filename = $_FILES['pet_photo']['name'];
			if(!empty($filename)){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);
                
			}
			try{
				$stmt = $conn->prepare("INSERT INTO requests (owner_id,pet_breed,request_type,
                appointment_type,request_status,request_concern,request_date,message_status)
                 VALUES (:owner_id,:pet_breed,:request_type,
                 :appointment_type,:request_status,:request_concern,:request_date,:message_status)");

                $stmt->execute(['owner_id'=>$session_id,'pet_breed'=>$pet_breed,
                'request_type'=>'Consultation',
                'appointment_type'=>$appointmentType,'request_status'=>'Pending',
				'request_concern'=>$request_concern,
                'request_date'=>$request_date,'message_status'=>0]);

				$history = $conn->prepare("INSERT INTO histories 
				(owner_id, pet_id, 
				request_type, appointment_type) 
				VALUES 
				(:owner_id, :pet_id, 
				:request_type, :appointment_type)");

				$history->execute([
				'owner_id'=>$session_id, 'pet_id'=>$pet_breed,
				'request_type'=>'Consultation', 'appointment_type'=>$appointmentType]);

				$_SESSION['consultationSuccess'] = 'Appointment request added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		// }

		$pdo->close();
    }
    if(isset($_POST['vaccination_add'])){
        $pet_breed = $_POST['petBreed'];
		$appointmentType = $_POST['appType'];
		$vaccineType = $_POST['vacType'];
		$session_id = $_POST['owner_id'];
        $request_date = $_POST['consDate'];
		$request_concern = $_POST['petConcern'];
		$conn = $pdo->open();

            $filename = $_FILES['pet_photo']['name'];
			if(!empty($filename)){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);
                
			}
			try{
				$stmt = $conn->prepare("INSERT INTO requests 
				(owner_id,pet_breed,request_type,appointment_type,
				vaccine_type,request_status,request_concern,request_date,message_status)
                 VALUES (:owner_id,:pet_breed,:request_type,:appointment_type,
				 :vaccine_type,:request_status,:request_concern,:request_date,:message_status)");

                $stmt->execute(['owner_id'=>$session_id,'pet_breed'=>$pet_breed,
                'request_type'=>'Vaccination',
				'appointment_type'=>$appointmentType,'vaccine_type'=>$vaccineType,
				'request_status'=>'Pending','request_concern'=>$request_concern,
                'request_date'=>$request_date,'message_status'=>0]);

				$_SESSION['vaccinationSuccess'] = 'Appointment request added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
    }
    if(isset($_POST['grooming_add'])){
        $pet_breed = $_POST['petBreed'];
        $appointmentType = $_POST['appType'];
		$session_id = $_POST['owner_id'];
        $request_date = $_POST['consDate'];
		$request_concern = $_POST['petConcern'];
		$conn = $pdo->open();

            $filename = $_FILES['pet_photo']['name'];
			if(!empty($filename)){
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);
                
			}
			try{
				$stmt = $conn->prepare("INSERT INTO requests (owner_id,pet_breed,request_type,
                appointment_type,request_status,request_concern,request_date,message_status)
                 VALUES (:owner_id,:pet_breed,:request_type,
                 :appointment_type,:request_status,:request_concern,:request_date,:message_status)");

                $stmt->execute(['owner_id'=>$session_id,'pet_breed'=>$pet_breed,
                'request_type'=>'Grooming','request_concern'=>$request_concern,
                'appointment_type'=>$appointmentType,'request_status'=>'Pending',
                'request_date'=>$request_date,'message_status'=>0]);

				$_SESSION['groomingSuccess'] = 'Appointment request added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		// }

		$pdo->close();
	}
	// else{
	// 	$_SESSION['error'] = 'Fill up category form first';
	// }

	header('location: services.php');

?>