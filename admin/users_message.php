<?php
	include 'includes/session.php';

    if(isset($_POST['send'])){
		$owner_id = $_POST['ownerID']; 
        $message = $_POST['message']; 
		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare
				("INSERT INTO messages 
				(owner_id,message,message_from,message_status)
                VALUES 
				(:owner_id,:message,:message_from,:message_status)");

                $stmt->execute
				(['owner_id'=>$owner_id,'message'=>$message,'message_from'=>'Admin','message_status'=>'Sent']);

				$_SESSION['success'] = 'Message Sent.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
    }

	header('location: users.php');

?>