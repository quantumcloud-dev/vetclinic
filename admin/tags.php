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
                h2{
                    text-align:center;
                }
                </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tags
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tags</li>
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
          <a href=""><i><h2>Show</h2></i></a><hr>
            <!-- <i class="text-center" style="color:blue"><h3> History</h3></i> -->
            <div class="box-body">
              <table id="history" class="table table-striped table-hover table-bordered bg-gray" style ="width:100%">
                <thead>
                <th>Request Id</th>
                    <th>Status</th>
                    <th>Tag</th>
                    
                    <th>Owner Id</th>
                    <th>Pet Id</th>
                    <th>Request Type</th>
                    <th>Appointment Type</th>
                    <th>Date Approved</th>
                    <th>Tools</th>
                </thead>
                <tfoot>
                <th>Request Id</th>
                    <th>Status</th>
                    <th>Tag</th>
                    
                    <th>Owner Id</th>
                    <th>Pet Id</th>
                    <th>Request Type</th>
                    <th>Appointment Type</th>
                    <th>Date Approved</th>
                    <th>Tools</th>
                </tfoot>

                <tbody>
                <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM histories where tag='Show' order by id DESC");
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
                            <td>".$row['request_id']."</td>
                            <td>".$status."</td>
                            <td>".$tag."</td>
                            
                            <td>".$row['owner_id']."</td>
                            <td>".$row['pet_id']."</td>
                            <td>".$row['request_type']."</td>
                            <td>".$row['appointment_type']."</td>
                            <td>".$row['date']."</td>
                            <td>
                            <button href='#uploadDiagnosis' 
                                data-id='".$row['pet_id']."' data-toggle='modal' 
                                class='upload btn btn-sm btn-primary'>
                                <i class='fa fa-plus'></i> Note
                            </button>
                           
                            <button href='#editPet' 
                              data-id='".$row['pet_id']."' data-toggle='modal' 
															class='edit btn btn-sm btn-success'>
														  <i class='fa fa-edit'></i> Edit
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

      <div class="row">
  
        <div class="col-xs-12">
          <div class="box">
        
      <a href=""><i><h2>No-Show</h2></i></a>
     
    
        <hr>
            <!-- <i class="text-center" style="color:blue"><h3> History</h3></i> -->
            <div class="box-body">
              <table id="noshow" class="table table-striped table-hover table-bordered bg-gray" style ="width:100%">
                <thead>
                <th>Request Id</th>
                    <th>Status</th>
                    <th>Tag</th>
                   
                    <th>Owner Id</th>
                    <th>Pet Id</th>
                    <th>Request Type</th>
                    <th>Appointment Type</th>
                    <th>Datetime</th>
                   
                </thead>
                <tfoot>
                <th>Request Id</th>
                    <th>Status</th>
                    <th>Tag</th>
                   
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
                      $stmt = $conn->prepare("SELECT * FROM histories where tag='No-Show' order by id DESC");
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
                            <td>".$row['request_id']."</td>
                            <td>".$status."</td>
                            <td>".$tag."</td>
                           
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
      <?php include 'pets_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

$(document).on('click', '.viewPet', function(e){
e.preventDefault();
$('#viewPet').modal('show');
var id = $(this).data('id');
getNote(id);
getRow(id);

}); 

$(document).on('click', '.docNotes', function(e){
e.preventDefault();
$('#addNote').modal('show');
var id = $(this).data('id');
getRow(id);
});

$(document).on('click', '.upload', function(e){
e.preventDefault();
$('#uploadDiagnosis').modal('show');
var id = $(this).data('id');
getRow(id);
});

$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#editPet').modal('show');
var id = $(this).data('id');
getRow(id);
});


function getRow(id){
$.ajax({
  type: 'POST',
  url: 'pets_row.php',
  data: {id:id},
  dataType: 'json',
  success: function(response){
    $('.pId').html(response.id);
    $('.pPhoto').html(response.pet_photo);
    $('.pName').html(response.pet_name);
    $('.pClass').html(response.pet_class);
    $('.pBreed').html(response.pet_breed);
    $('.pBirth').html(response.pet_birth);
    $('.pTemp').html(response.pet_temp);
    $('.pKilo').html(response.pet_weight);
    
    $('.ownerID').html(response.owner_id);
    $('.pTemp').val(response.pet_temp);
    $('.pKilo').val(response.pet_weight);

    $('.petID').val(response.id);
    $('.ownerID').val(response.owner_id);
  }
});
}

function getNote(id){
$.ajax({
  type: 'POST',
  url: 'pets_note_row.php',
  data: {id:id},
  dataType: 'json',
  success: function(response){
    $('.petID').val(response.id);
    $('.ownerID').val(response.owner_id);

    $('.pNote').html(response.pet_note);
  }
});
}

});
</script>
</body>
</html>
