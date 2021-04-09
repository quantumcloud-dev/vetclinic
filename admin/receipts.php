<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <style>
        td{
        text-align:center;
        }
        th{
        text-align:center;
        }
        </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Receipts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Receipts</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <table id="receipts" class="table table-bordered table-striped table-hover bg-gray" style="width:100%">
                    <thead>
                        <th>No.</th>
                        <th>Type</th>
                        <th>User ID</th>
                        <th>Item/Service</th>
                        <th>Desription</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Amount Total</th>
                        <th>Date</th>
                    </thead>
                   
                    <tbody>
                    
                    <?php
                        $conn = $pdo->open();

                        try{
                        $stmt = $conn->prepare("SELECT * FROM receipts order by date DESC");
                        $stmt->execute();
                        $status = '';
                        foreach($stmt as $row){
                            if($row['type']=='Vaccine'){
                            $status = "<p class='text-center' style='color:white; background-color:green;'>
                            ".$row['type']."
                            </p>";
                            }
                            if($row['type']=='Groom'){
                            $status = "<p class='text-center' style='color:white; background-color:blue;'>
                            ".$row['type']."
                            </p>";
                            }
                            if($row['type']=='CBC'){
                            $status = "<p class='text-center' style='color:white; background-color:orange;'>
                            ".$row['type']."
                            </p>";
                            }
                            if($row['type']=='BLOOD CHEM'){
                                $status = "<p class='text-center' style='color:white; background-color:purple;'>
                                ".$row['type']."
                                </p>";
                                }
                        
                            echo "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$status."</td>
                                <td>".$row['owner_id']."</td>
                                <td>".$row['item_name']."</td>
                                <td>".$row['item_description']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['amount']."</td>
                                <td>".$row['totalAmount']."</td>
                                
                                <td>".$row['date']."</td>
                            
                            
                            </tr>
                            ";
                        }
                        }
                        catch(PDOException $e){
                        echo $e->getMessage();
                        }

                        $pdo->close();
                    ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </section>
        
    </div>
        <?php include 'includes/footer.php'; ?>
      

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>
  
</body>
</html>
