<?php
    include 'session.php';
    $conn = $pdo->open();
    try{
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
        foreach($stmt as $row){
            echo "
                <option value=".$row['item_description'].">
                    <p>
                    ".$row['item_description']."
                    </p>
                </option>

               
            ";
        }
    }catch(PDOException $e){
    echo $e->getMessage();
    }

    $pdo->close();
?>