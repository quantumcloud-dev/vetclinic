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
        Documentations
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Documentations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <i class="text-center" style="color:blue"><h3> History</h3></i> -->
            <div class="box-body">
              <table id="history" class="table table-striped table-bordered table-hover bg-gray"  style ="width:100%">
                <thead>
                    <th>No.</th>
                    <th>Pet ID</th>
                    <th>Owner ID</th>
                    <th>Weight</th>
                    <th>Temperature</th>
                    <th>Documents</th>
                    <th>Laboratory</th>
                    <th>DateTime</th>
                </thead>
                <tfoot>
                    <th>No.</th>
                    <th>Pet ID</th>
                    <th>Owner ID</th>
                    <th>Weight</th>
                    <th>Temperature</th>
                    <th>Documents</th>
                    <th>Laboratory</th>
                    <th>DateTime</th>
                </tfoot>

                <tbody>
                <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM documentations");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['pet_id']."</td>
                                <td>".$row['owner_id']."</td>
                                <td>".$row['pet_weight']."</td>
                                <td>".$row['pet_temperature']."</td>
                                <td>".$row['pet_document']."</td>
                                <td>".$row['pet_laboratory']."</td>
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
