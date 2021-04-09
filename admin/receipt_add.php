<?php
	include 'includes/session.php';

	if(isset($_POST['receipt'])){
		
		$owner_id = $_POST['ownerID'];

		$conn = $pdo->open();

			try{
				if(totalAmount != 0){
					$item_name = $_POST['item'];
					$item_description = $_POST['description'];
					$quantity = $_POST['quantity'];
					$amount = $_POST['amount'];
					$totalAmount = $quantity * $amount;
					$totalFinal = $totalAmount;

					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name,
					'item_description'=>$item_description,'quantity'=>$quantity,'amount'=>$amount,
					'totalAmount'=>$totalAmount,'totalFinal'=>$totalFinal]);

					$_SESSION['success'] = 'Receipt added.';

				}
				if(totalAmount1 !=0){
					$item_name1 = $_POST['item1'];
					$item_descriptio1 = $_POST['description1'];
					$quantity1 = $_POST['quantity1'];
					$amount1 = $_POST['amount1'];
					$totalAmount1 = $quantity1 * $amount1;
					$totalFinal1 = $totalAmount1;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name1,
					'item_description'=>$item_description1,'quantity'=>$quantity1,'amount'=>$amount1,
					'totalAmount'=>$totalAmount1,'totalFinal'=>$totalFinal1]);
					$_SESSION['success'] = 'Receipt added.';
					
				}
				if(totalAmount2 != 0){
					$item_name2 = $_POST['item2'];
					$item_description2 = $_POST['description2'];
					$quantity2 = $_POST['quantity2'];
					$amount2 = $_POST['amount2'];
					$totalAmount2 = $quantity2 * $amount2;
					$totalFinal2 = $totalAmount2;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name2,
					'item_description'=>$item_description2,'quantity'=>$quantity2,'amount'=>$amount2,
					'totalAmount'=>$totalAmount2,'totalFinal'=>$totalFinal2]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount3 != 0){
					$item_name3 = $_POST['item3'];
					$item_description3 = $_POST['description3'];
					$quantity3 = $_POST['quantity3'];
					$amount3 = $_POST['amount3'];
					$totalAmount3 = $quantity3 * $amount3;
					$totalFinal3 = $totalAmount3;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name3,
					'item_description'=>$item_description3,'quantity'=>$quantity3,'amount'=>$amount3,
					'totalAmount'=>$totalAmount3,'totalFinal'=>$totalFinal3]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount4 != 0){
					$item_name4 = $_POST['item4'];
					$item_description4 = $_POST['description4'];
					$quantity4 = $_POST['quantity4'];
					$amount4 = $_POST['amount4'];
					$totalAmount4 = $quantity4 * $amount4;
					$totalFinal4 = $totalAmount4;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name4,
					'item_description'=>$item_description4,'quantity'=>$quantity4,'amount'=>$amount4,
					'totalAmount'=>$totalAmount4,'totalFinal'=>$totalFinal4]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount5 != 0){
					$item_name5 = $_POST['item5'];
					$item_description5 = $_POST['description5'];
					$quantity5 = $_POST['quantity5'];
					$amount5 = $_POST['amount5'];
					$totalAmount5 = $quantity5 * $amount5;
					$totalFinal5 = $totalAmount5;

					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name5,
					'item_description'=>$item_description5,'quantity'=>$quantity5,'amount'=>$amount5,
					'totalAmount'=>$totalAmount5,'totalFinal'=>$totalFinal5]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount6 != 0){
					$item_name6 = $_POST['item6'];
					$item_description6 = $_POST['description6'];
					$quantity6 = $_POST['quantity6'];
					$amount6 = $_POST['amount6'];
					$totalAmount6 = $quantity6 * $amount6;
					$totalFinal6 = $totalAmount6;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name6,
					'item_description'=>$item_description6,'quantity'=>$quantity6,'amount'=>$amount6,
					'totalAmount'=>$totalAmount6,'totalFinal'=>$totalFinal6]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount7 != 0){
					$item_name7 = $_POST['item7'];
					$item_description7 = $_POST['description7'];
					$quantity7 = $_POST['quantity7'];
					$amount7 = $_POST['amount7'];
					$totalAmount7 = $quantity7 * $amount7;
					$totalFinal7 = $totalAmount7;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,'item_name'=>$item_name7,
					'item_description'=>$item_description7,'quantity'=>$quantity7,'amount'=>$amount7,
					'totalAmount'=>$totalAmount7,'totalFinal'=>$totalFinal7]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount8 !=0){
					$item_name8 = $_POST['item8'];
					$item_description8 = $_POST['description8'];
					$quantity8 = $_POST['quantity8'];
					$amount8 = $_POST['amount8'];
					$totalAmount8 = $quantity8 * $amount8;
					$totalFinal8 = $totalAmount8;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,
					'item_name'=>$item_name8,
					'item_description'=>$item_description8,'quantity'=>$quantity8,'amount'=>$amount8,
					'totalAmount'=>$totalAmount8,'totalFinal'=>$totalFinal8]);

					$_SESSION['success'] = 'Receipt added.';
				}
				if(totalAmount9 != 0){
					$item_name9 = $_POST['item9'];
					$item_description9 = $_POST['description9'];
					$quantity9 = $_POST['quantity9'];
					$amount9 = $_POST['amount9'];
					$totalAmount9 = $quantity9 * $amount9;
					$totalFinal9 = $totalAmount9;
						
					$stmt = $conn->prepare("INSERT INTO receipts 
					(owner_id,item_name,item_description,quantity,amount,
					totalAmount,totalFinal)
					VALUES 
					(:owner_id,:item_name,:item_description,:quantity,:amount,
					:totalAmount,:totalFinal)");
					
					$stmt->execute(['owner_id'=>$owner_id,
					'item_name'=>$item_name9,
					'item_description'=>$item_description9,'quantity'=>$quantity9,'amount'=>$amount9,
					'totalAmount'=>$totalAmount9,'totalFinal'=>$totalFinal9]);

					$_SESSION['success'] = 'Receipt added.';
				}
				
				else{
					$_SESSION['error'] = 'Null Receipt value.';
				}
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up form first.';
	}

	header('location: users.php');

?>