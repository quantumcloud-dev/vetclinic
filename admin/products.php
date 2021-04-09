<?php
    include 'session.php';
    $conn = $pdo->open();
    try{
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
        foreach($stmt as $row){
            echo "
                <option value=".$row['item_name']." id=".$row['product_id'].">
                    <p>
                    ".$row['item_name']."
                    </p>
                </option>

               
            ";
        }
    }catch(PDOException $e){
    echo $e->getMessage();
    }

    $pdo->close();
?>