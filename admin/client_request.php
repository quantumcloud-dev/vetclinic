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
      button{
        margin:1px;
      }
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Requests</li>
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
            <div class="box-header bg-gray">
              <i class="text-center" style="color:blue"><h4> Approved Requests</h4></i></div>
              <div class="box-body">
                <table id="approved1" class="table table-striped table-bordered table-hover bg-gray" style="height:100%">
                  <thead>
                      
                      <th>Request Id</th>
                      <th>Status</th>
                      <th>Owner Id</th>
                      <th>Pet Id</th>
                      <th>Request Type</th>
                      <th>Appointment Type</th>
                      <th>Appointment Date</th>
                      <th>Date Requested</th>
                      <th colspan="2">Tag</th>
                  </thead>

                  <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM requests where request_status='Approved' and tag != 'Show' and tag != 'No-Show' order by request_id DESC");
                        $stmt->execute();
                        foreach($stmt as $row){
                          echo "
                              <tr>
                             
                              <td>".$row['request_id']."</td>
                              <td class='text-center'><p style='color:white; background-color:green;'>".$row['request_status']."</p></td>
                              <td>".$row['owner_id']."</td>
                             
                              <td>".$row['pet_breed']."</td>
                              <td>".$row['request_type']."</td>
                            
                              <td>".$row['appointment_type']."</td>
                              <td>".$row['request_date']."</td>
                              <td>".$row['date_requested']."</td>
                                                    
                              <td>
                                <button class='btn bg-blue btn-sm show' data-id='".$row['request_id']."'>
                                <i class='fa fa-eye'></i> Show</button>  
                              </td>
                              <td>
                                <button class='btn bg-red btn-sm noShow' data-id='".$row['request_id']."'>
                                <i class='fa fa-eye-slash'></i> No-Show</button>
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

                  <tfoot>
                      
                      <th>Request Id</th>
                      <th>Status</th>
                      <th>Owner Id</th>
                  
                      <th>Pet Id</th>
                      <th>Request Type</th>
                      <th>Appointment Type</th>
                      <th>Request Date</th>
                      <th>Date</th>
                      <th colspan="2">Tag</th>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-gray">
              <i class="text-center" style="color:blue"><h4> Rejected Requests</h4></i></div>
              <div class="box-body">
                <table id="history" class="table table-striped table-bordered table-hover bg-gray" style="height:100%">
                  <thead>
                      
                      <th>Request Id</th>
                      <th>Status</th>
                      <th>Owner Id</th>
                      <th>Pet Id</th>
                      <th>Request Type</th>
                      <th>Appointment Type</th>
                      <th>Appointment Date</th>
                      <th>Date Requested</th>
                      <th colspan="2">Tag</th>
                  </thead>

                  <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM requests where request_status='Rejected' and tag != 'Show' and tag != 'No-Show' order by request_id DESC");
                        $stmt->execute();
                        foreach($stmt as $row){
                          echo "
                              <tr>
                             
                              <td>".$row['request_id']."</td>
                              <td class='text-center'><p style='color:white; background-color:red;'>".$row['request_status']."</p></td>
                              <td>".$row['owner_id']."</td>
                             
                              <td>".$row['pet_breed']."</td>
                              <td>".$row['request_type']."</td>
                            
                              <td>".$row['appointment_type']."</td>
                              <td>".$row['request_date']."</td>
                              <td>".$row['date_requested']."</td>
                                                    
                              <td>
                                <button class='btn btn-danger btn-sm delete' data-id='".$row['request_id']."'>
                                <i class='fa fa-trash'></i> Delete</button>
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

                  <tfoot>
                      
                      <th>Request Id</th>
                      <th>Status</th>
                      <th>Owner Id</th>
                  
                      <th>Pet Id</th>
                      <th>Request Type</th>
                      <th>Appointment Type</th>
                      <th>Request Date</th>
                      <th>Date</th>
                      <th colspan="2">Tag</th>
                  </tfoot>
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
  $(document).on('click', '.viewConcern', function(e){
    e.preventDefault();
    $('#viewConcern').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

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
        $('.reqConcern').html(response.request_concern);  
    }
  });
}
</script>
</body>
</html>
