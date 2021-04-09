<?php
	include 'includes/session.php';

    $item = $_POST['item'];
	$type = $_POST['type'];
	$quantity = $_POST['qty'];
    $description = $_POST['description'];

	if(isset($_POST['add'])){
 
      

		$conn = $pdo->open();

           
			try{
				$stmt = $conn->prepare("INSERT INTO products (item_name,quantity,type,item_description)
                 VALUES (:item_name,:quantity,:type,:item_description)");

                $stmt->execute(['item_name'=>$item,'quantity'=>$quantity,'type'=>$type,'item_description'=>$description]);

				
				$_SESSION['success'] = 'Product added successfully.';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
	

		$pdo->close();
    }
    if(isset($_POST['edit'])){
		$id = $_POST['id'];
	
		try{
			$stmt = $conn->prepare("UPDATE products SET item_name=:item_name,quantity=:quantity,type=:type,
			 item_description=:item_description
			WHERE product_id = :product_id");

            $stmt->execute(['item_name'=>$item,'quantity'=>$quantity,'type'=>$type,
			'item_description'=>$description, 'product_id'=>$id]);
			
			$_SESSION['success'] = 'Product updated successfully.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	
		}else{
		// $_SESSION['error'] = 'Fill up edit category form first';
	}
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM products WHERE product_id=:product_id");
			$stmt->execute(['product_id'=>$id]);

			$_SESSION['success'] = 'Product Deleted Successfully.';
		}
		catch(PDOException $e){
			// $_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
		
	}
	// else{
	// 	$_SESSION['error'] = 'Fill up category form first';
	// }

	header('location: item_service.php');

?>