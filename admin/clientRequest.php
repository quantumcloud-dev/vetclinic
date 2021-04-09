<?php
	include 'includes/session.php';

		$id = $_POST['id'];
        // $requestStatus = $_POST['requestStatus'];
		$ownerID = $_POST['owner_ID'];
		$petID = $_POST['pet_ID'];
		$reqType = $_POST['req_Type'];
		$appType = $_POST['app_Type'];
		$vacType = $_POST['vac_Type'];

		if(isset($_POST['appointment_accept'])){
		
			try{
				$note = $conn->prepare("UPDATE requests SET 
				tag=:tag,
				request_note=:request_note,
				message_status=:message_status,
				request_status=:request_status
				WHERE request_id=:request_id");

				$history = $conn->prepare("INSERT INTO histories 
				(request_status, request_id, owner_id, pet_id, request_type, appointment_type) 
				VALUES 
				(:request_status, :request_id, :owner_id, :pet_id, :request_type, :appointment_type)");

				$note->execute(['tag'=>0,'request_note'=>'Your Appointment has been Approved.',
				'message_status'=>1,'request_status'=>'Approved', 'request_id'=>$id]);
		
				$history->execute(['request_status'=>'Approved', 'request_id'=>$id,
				'owner_id'=>$ownerID, 'pet_id'=>$petID,
				'request_type'=>$reqType, 'appointment_type'=>$appType]);
				$_SESSION['acceptSuccess'] = 'Appointment Approved.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
			
			$pdo->close();
		}

		if(isset($_POST['appointment_reject'])){

			try{
				$note = $conn->prepare("UPDATE requests SET 
				request_note=:request_note,
				message_status=:message_status,
				request_status=:request_status
				WHERE request_id=:request_id");

				$history = $conn->prepare("INSERT INTO histories 
				(request_status, request_id, owner_id, pet_id, request_type, appointment_type) 
				VALUES 
				(:request_status, :request_id, :owner_id, :pet_id, :request_type, :appointment_type)");

				$note->execute(['request_note'=>'Your Appointment has been Rejected.',
				'message_status'=>1,'request_status'=>'Rejected', 'request_id'=>$id]);

				$history->execute(['request_status'=>'Rejected', 'request_id'=>$id,
				'owner_id'=>$ownerID, 'pet_id'=>$petID,
				'request_type'=>$reqType, 'appointment_type'=>$appType]);

				$_SESSION['rejectSuccess'] = 'Appointment Rejected.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
			
			$pdo->close();
		}

		if(isset($_POST['appointment_delete'])){
			
			try{
				$note = $conn->prepare("DELETE FROM requests
				WHERE request_id=:request_id");

				$history = $conn->prepare("INSERT INTO histories 
				(request_status, request_id, owner_id, pet_id, request_type, appointment_type) 
				VALUES 
				(:request_status, :request_id, :owner_id, :pet_id, :request_type, :appointment_type)");

				$note->execute(['request_id'=>$id]);

				$history->execute(['request_status'=>'Deleted', 'request_id'=>$id,
				'owner_id'=>$ownerID, 'pet_id'=>$petID,
				'request_type'=>$reqType, 'appointment_type'=>$appType]);

				$_SESSION['rejectSuccess'] = 'Appointment Deleted.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
			
			$pdo->close();
		}

		if(isset($_POST['appointment_show'])){

			try{
				$request = $conn->prepare("UPDATE requests SET 
				tag=:tag WHERE request_id=:request_id");	

				$history = $conn->prepare("INSERT INTO histories 
				(request_status,tag, request_id, owner_id, pet_id, request_type, appointment_type) 
				VALUES 
				(:request_status,:tag, :request_id, :owner_id, :pet_id, :request_type, :appointment_type)");

				$history->execute(['request_status'=>'Approved','tag'=>'Show', 'request_id'=>$id,
				'owner_id'=>$ownerID, 'pet_id'=>$petID,
				'request_type'=>$reqType, 'appointment_type'=>$appType]);

			

				$request->execute(['tag'=>'Show', 'request_id'=>$id]);

				$_SESSION['acceptSuccess'] = 'Request No: '.$id.' Tagged Successfully.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
			
			$pdo->close();
		}

		if(isset($_POST['appointment_noShow'])){

			try{	
				$request = $conn->prepare("UPDATE requests SET 
				tag=:tag WHERE request_id=:request_id");

				$history = $conn->prepare("INSERT INTO histories 
				(request_status,tag, request_id, owner_id, pet_id, request_type, appointment_type) 
				VALUES 
				(:request_status,:tag, :request_id, :owner_id, :pet_id, :request_type, :appointment_type)");

				$history->execute(['request_status'=>'Approved','tag'=>'No-Show', 'request_id'=>$id,
				'owner_id'=>$ownerID, 'pet_id'=>$petID,
				'request_type'=>$reqType, 'appointment_type'=>$appType]);

				$request->execute(['tag'=>'No-Show', 'request_id'=>$id]);
 
				$_SESSION['acceptSuccess'] = 'Request No: '.$id.' Tagged Successfully.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
			
			$pdo->close();
		}
		// else{
		// 	$_SESSION['error'] = 'Fill up edit category form first';
		// }

		header('location: client_request_pending.php');

?>