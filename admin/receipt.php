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
        Receipt
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Receipt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
            if(isset($_SESSION['error'])){
              echo "
                <div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>
                  ".$_SESSION['error']."
                </div>
              ";
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo "
                <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>
                  ".$_SESSION['success']."
                </div>
              ";
              unset($_SESSION['success']);
            }
        ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box-body">
                   
            <form class="form-horizontal" action="receipt_add.php" method="POST" ></form>
                <label for="">Select Owner ID: </label>
                  <select name="ownerID" class="" required>
                    <option value="" selected></option>     

                    <?php
                        include 'session.php';
                        $conn = $pdo->open();
                        try{
                        $stmt = $conn->prepare("SELECT * FROM users where type = 0");
                        $stmt->execute();
                    
                            foreach($stmt as $row){
                                $image = (!empty($row['photo'])) 
                                ? 'images/'.$row['photo'] 
                                : 'images/profile.jpg';
                                echo "
                                                                    
                                    <option value=".$row['id'].">
                                        Owner ID: ".$row['id']." 
                                        *Name: ".$row['firstname']." ".$row['lastname']."</option>
                                      
            
                                ";
                            }
                        }catch(PDOException $e){
                        echo $e->getMessage();
                        }

                        $pdo->close();
                    ?>
                  </select>
              <hr>
              <table id="receipt" class="table table-striped table-hover bg-gray"  style ="width:100%">
                  <thead> 
                      <th>Item</th>
                      <th>Descriptions</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                      <th>Total Amount</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                              <select name="item" id="">
                              <option value=""></option>
                            <?php include "products.php";?>
                              </select>
                          </td>
                          <td>
                              <select name="description" id="">
                              <option value=""></option>
                            <?php include "products_description.php";?>
                              </select>
                          </td>
                              
                              
                          </td>
                          <td><input type="number" id="quantity" name="quantity"></td>
                          <td><input type="text" id="amount" name="amount"></td>
                          <td><input type="text" id="totalAmount" name="totalAmount" disabled></td>
                      </tr>

                      <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><input type="text" id="totalFinal" name="totalFinal" disabled></td></td>
                      </tr>
                  
                      
                  </tbody>
              </table>
              <div class="pull-right">
                <button class='btn btn-sm bg-green' onclick="myFunction()">
                    <i class='fa fa-calculator'></i> Compute
                </button>
                <button class='receipt btn btn-sm bg-blue' type="submit" name="saveReceipt">
                    <i class='fa fa-save'></i> Save
                </button>
              </div>

            </form>
                    
                            

          </div>
        
        </div>
      </div>
    </section>
     
  </div>

  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
    function myFunction() {
       
        var quantity = document.getElementById("quantity").value;
        var amount = document.getElementById("amount").value;
    
       var totalAmount = document.getElementById("totalAmount").value = quantity * amount;

        var totalFinal = 0;

        document.getElementById("totalFinal").value = totalFinal + totalAmount;
        
    }
                        
</script>
</body>


</html>




