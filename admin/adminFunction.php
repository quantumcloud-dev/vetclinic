<?php
	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	

	if(isset($_POST['add'])){

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];

		
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		
		// $photo = $_POST['photo'];
		$birthdate = $_POST['birthdate'];
		$email = $_POST['email'];

		$password = $_POST['password'];
		$repassword = $_POST['repassword'];


		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match.';
			header('location: admin.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: admin.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_BCRYPT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
				
					$stmt = $conn->prepare("INSERT INTO users 
					(email, password, type, status, firstname, middlename, lastname, 
					birthdate ,contact_info, created_on) 
					VALUES 
					(:email, :password, :type, :status, :firstname, :middlename, :lastname, 
					:birthdate, :contact_info, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password,'type'=>1, 'status'=>1, 'firstname'=>$firstname, 'middlename'=>$middlename, 'lastname'=>$lastname,
					'birthdate'=>$birthdate, 'contact_info'=>$contact,
					'now'=>$now]);
					
					$userid = $conn->lastInsertId();
					$_SESSION['success'] = "*"+$email+"* added Successfully.";

				       
				        header('location: admin.php');

				    } 
				    catch (Exception $e) {
				        // $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: admin.php');
				    }


				}
				// catch(PDOException $e){
				// 	$_SESSION['error'] = $e->getMessage();
				// 	header('location: register.php');
				// }

				$pdo->close();

			}

	}

	if(isset($_POST['edit'])){
		$id = $_POST['userID'];

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];

		
		$address = $_POST['address'];
		$contact = $_POST['contact'];
	
		try{
			$stmt = $conn->prepare("UPDATE users SET firstname=:firstname, middlename=:middlename
			, lastname=:lastname, address=:address, contact_info=:contact_info
			WHERE id = :id");

            $stmt->execute(['firstname'=>$firstname,'middlename'=>$middlename
			,'lastname'=>$lastname,'address'=>$address,'contact_info'=>$contact, 'id'=>$id]);
			
			$_SESSION['success'] = 'User updated successfully.';
		}
		catch(PDOException $e){
			// $_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
		header('location: admin.php');
		}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}

	if(isset($_POST['delete'])){
		$id = $_POST['userID'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'User Removed Successfully.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
		header('location: admin.php');
	}
	else{
		// $_SESSION['error'] = 'Select category to delete first';
	}

	
	


	// }
	// else{
	// 	$_SESSION['error'] = 'Fill up signup form first';
	// 	
	// }

?>