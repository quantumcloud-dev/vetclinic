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
        Appointment History
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
      </ol>
    </section>

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
        
        if(isset($_SESSION['rejectSuccess'])){
          echo "
            <div class='alert alert-danger alert-dismissible fade-out'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['rejectSuccess']."
            </div>
          ";
          unset($_SESSION['rejectSuccess']);
        }
        if(isset($_SESSION['acceptSuccess'])){
          echo "
            <div class='alert alert-success alert-dismissible fade-out'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['acceptSuccess']."
            </div>
          ";
          unset($_SESSION['acceptSuccess']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <i class="text-center" style="color:blue"><h3> History</h3></i> -->
            <div class="box-body">
              <table id="history" class="table table-striped table-hover table-bordered bg-gray" style ="width:100%">
                <thead>
                    <th>History No.</th>
                    <th>Status</th>
                    <th>Tag</th>
                    <th>Request Id</th>
                    <th>Owner Id</th>
                    <th>Pet Id</th>
                    <th>Request Type</th>
                    <th>Appointment Type</th>
                    <th>Datetime</th>
                </thead>
                <tfoot>
                    <th>History No.</th>
                    <th>Status</th>
                    <th>Tag</th>
                    <th>Request Id</th>
                    <th>Owner Id</th>
                    <th>Pet Id</th>
                    <th>Request Type</th>
                    <th>Appointment Type</th>
                    <th>Datetime</th>
                </tfoot>

                <tbody>
                <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM histories order by id DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                          if($row['request_status']=='Approved'){
                            $status = "<p class='text-center' style='color:white; background-color:green;'>
                            ".$row['request_status']."
                            </p>";
                          }
                          if($row['request_status']=='Rejected'){
                            $status = "<p class='text-center' style='color:white; background-color:red;'>
                            ".$row['request_status']."
                            </p>";
                          }
                          if($row['request_status']=='Deleted'){
                            $status = "<p class='text-center' style='color:white; background-color:red;'>
                            ".$row['request_status']."
                            </p>";
                          }
                          if($row['tag']=='Show'){
                            $tag = "<p class='text-center' style='color:white; background-color:blue;'>
                            ".$row['tag']."
                            </p>";
                          }
                          if($row['tag']=='No-Show'){
                            $tag = "<p class='text-center' style='color:white; background-color:red;'>
                            ".$row['tag']."
                            </p>";
                          }
                          if($row['tag']==''){
                            $tag = "<p class='text-center''>
                            ".$row['tag']."
                            </p>";
                          }
                          
                        
                        echo "
                          <tr>
                            <td>".$row['id']."</td>
                            <td>".$status."</td>
                            <td>".$tag."</td>
                            <td>".$row['request_id']."</td>
                            <td>".$row['owner_id']."</td>
                            <td>".$row['pet_id']."</td>
                            <td>".$row['request_type']."</td>
                            <td>".$row['appointment_type']."</td>
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
    <?php include 'client_request_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.accept', function(e){
    e.preventDefault();
    $('#acceptAppointment').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.reject', function(e){
    e.preventDefault();
    $('#rejectAppointment').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#deleteAppointment').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  $(document).on('click', '.show', function(e){
    e.preventDefault();
    $('#tagShow').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.noShow', function(e){
    e.preventDefault();
    $('#tagnoShow').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'client_request_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){

        $('.reqId').val(response.request_id)

        $('.ownerID').val(response.owner_id)
        $('.petID').val(response.pet_breed)

        $('.reqType').val(response.request_type)
        $('.appType').val(response.appointment_type)
        $('.vacType').val(response.vaccine_type)

        $('.id').html(response.request_id);
        $('.owner').html(response.owner_id);
        $('.reqStatus').html(response.request_status);

       
      
    
    }
  });
}
</script>
</body>
</html>
