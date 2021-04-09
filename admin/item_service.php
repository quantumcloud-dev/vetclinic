<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product and Services
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product and Service</li>
      </ol>
    </section>
    <style>
        td{
            text-align:center;
        }
        th{
            text-align:center;
        }
    </style>

    <!-- Main content -->
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible fade-out'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
           
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible fade-out'>
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
            <!-- <i class="text-center" style="color:blue"><h3> History</h3></i> -->
          <br>
            <div class="box-title text-center">
             
                <button href='#addProduct' 
                    data-toggle='modal' 
                    class='add btn btn-flat btn-sm btn-primary'>
                    <i class='fa fa-plus'></i> Add Product/Service
                </button>
            </div>
            <div class="box-body">
           
              <table id="history" class="table table-striped table-bordered table-hover bg-gray" style ="width:100%">
                <thead>
                    <th>Product/Service</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Date Updated</th>
                    <th>Tools</th>
                </thead>
            
                <tbody>
                <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM products");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "<tr>
                                
                                <td>".$row['item_name']."</td>
                                <td>".$row['item_description']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['type']."</td>
                                <td>".$row['date_updated']."</td>
                                <td>
                                    <button href='#editProduct' 
                                        data-id='".$row['product_id']."' data-toggle='modal' 
                                        class='edit btn btn-sm btn-success'>
                                        <i class='fa fa-edit'></i> Edit
                                    </button>

                                    <button href='#deleteProduct' 
                                        data-id='".$row['product_id']."' data-toggle='modal' 
                                        class='delete btn btn-sm btn-danger'>
                                        <i class='fa fa-trash'></i> Delete
                                    </button>
                                </td>
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
  	<?php include 'includes/footer.php';?>
      <?php  include 'item_service_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.add', function(e){
    e.preventDefault();
    $('#addProduct').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#editProduct').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#deleteProduct').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'item_service_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){

        $('.prodID').val(response.product_id);
        $('.item').val(response.item_name);
        $('.qty').val(response.quantity);
        $('.type').val(response.type);
        $('.description').val(response.item_description);

        $('.prodID').html(response.product_id);
        $('.item').html(response.item_name);
        $('.description').html(response.item_description);


       
      
    
    }
  });
}
</script>
</body>
</html>
