<?php
	include 'includes/session.php';

    if(isset($_POST['send'])){
        $userID = $_POST['userID']; 
		$from = $_POST['senderID']; 
        $message = $_POST['message']; 
		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare
				("INSERT INTO messages 
				(owner_id,message,message_from,message_status)
                VALUES 
				(:owner_id,:message,:message_from,:message_status)");

                $stmt->execute
				(['owner_id'=>$userID,'message'=>$message,'message_from'=>$from,'message_status'=>'Replied']);

				$_SESSION['success'] = 'Message Sent.';
			}
			catch(PDOException $e){
				// $_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
    }

	header('location: inbox.php');

?>