	<?php
	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];

		$birthdate = $_POST['birthdate'];


		$address = $_POST['address'];
		$contact = $_POST['contact'];
		// $photo = $_POST['photo'];

		$email = $_POST['email'];

		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		// if(!isset($_SESSION['captcha'])){
		// 	require('recaptcha/src/autoload.php');		
		// 	$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
		// 	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		// 	if (!$resp->isSuccess()){
		//   		$_SESSION['error'] = 'Please answer recaptcha correctly';
		//   		header('location: signup.php');	
		//   		exit();	
		//   	}	
		//   	else{
		//   		$_SESSION['captcha'] = time() + (10*60);
		//   	}

		// }

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_BCRYPT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					// $stmt1 = $conn->prepare("INSERT INTO members (username,password,firstname,lastname,gender,image) values ('$email','$password','$firstname','$lastname','','images/No_Photo_Available.jpg')");	
					// $stmt1->execute();
					$stmt = $conn->prepare("INSERT INTO users 
					(email, password, firstname, middlename, lastname, 
					birthdate ,contact_info, activate_code, created_on) 
					VALUES 
					(:email, :password, :firstname, :middlename, :lastname, 
					:birthdate, :contact_info, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'middlename'=>$middlename, 'lastname'=>$lastname,
					'birthdate'=>$birthdate, 'contact_info'=>$contact,
					 'code'=>$code, 'now'=>$now]);
					
					$userid = $conn->lastInsertId();
					$_SESSION['success'] = "Account created. Please Click here to Activate your Account.
					<a href='http://localhost/VetClinic/activate.php?code=".$code."&user=".$userid."'>
					Activate Account</a>";


					// Message for PHPMailer
					// $message = "
					// 	<h2>Thank you for Registering.</h2>
					// 	<p>Your Account:</p>
					// 	<p>Email: ".$email."</p>
					// 	<p>Password: ".$_POST['password']."</p>
					// 	<p>Please click the link below to activate your account.</p>
					// 	<a href='http://localhost/FishBook/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					// ";

					// //Load phpmailer
		    		// require 'vendor/autoload.php';


					// //PHP mailer
		    		// $mail = new PHPMailer(true);                             
				    // try {
				    //     //Server settings
				    //     $mail->isSMTP();                                     
				    //     $mail->Host = 'smtp.mailtrap.io';                      
				    //     $mail->SMTPAuth = true;                               
				    //     $mail->Username = '136ec869fa79cc';     
					// 	$mail->Password = '00850e85eb75e0';
					// 	$mail->SMTPSecure = 'tls';                           
				    //     $mail->Port = 2525;                     
				    //     $mail->SMTPOptions = array(
				    //         'ssl' => array(
				    //         'verify_peer' => false,
				    //         'verify_peer_name' => false,
				    //         'allow_self_signed' => true
				    //         )
				    //     );                         
				                                          
					// 	//From
				    //     $mail->setFrom($email,$firstname);
				        
				    //     //To Recipients
				    //     $mail->addAddress($email,$firstname);              
				      
				       
				    //     //Content
				    //     $mail->isHTML(true);                                  
				    //     $mail->Subject = 'Fishbook Sign Up';
				    //     $mail->Body    = $message;

					// 	$mail->send();
						
					// 	if($mail->send()){
					// 		echo 'Message has been sent';
					// 	}else{
					// 		echo 'Message could not be sent.';
					// 		echo 'Mailer Error: ' . $mail->ErrorInfo;
					// 	}

				    //     unset($_SESSION['firstname']);
				    //     unset($_SESSION['lastname']);
				    //     unset($_SESSION['email']);

				       
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				}
				// catch(PDOException $e){
				// 	$_SESSION['error'] = $e->getMessage();
				// 	header('location: register.php');
				// }

				$pdo->close();

			}

		}

	// }
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>