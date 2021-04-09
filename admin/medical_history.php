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
        Medical History
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Medical History</li>
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
      <style>
              th{
                text-align:center;
              }
              td{
                text-align:center;
              }
      </style>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div> -->
            <div class="box-body">
              <table id="history" class="table table-bordered table-striped table-hover bg-gray" style="width:100%">
                <thead>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Pet ID</th>
                    <th>Owner ID</th>
                   
                    <th>Note</th>
                    <th>Datetime</th>
                    <th>Tools</th>
                </thead>
                <tfoot>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Pet ID</th>
                    <th>Owner ID</th>
                   
                    <th>Note</th>
                    <th>Datetime</th>
                    <th>Tools</th>
                </tfoot>
                
                <tbody>
                  <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM diagnosis order by id DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) 
                        ? '../images/'.$row['photo'] 
                        : '../images/profile.jpg';
                       
                        echo "
                          <tr class='text-center'>
                            <td class='viewPet' data-id='".$row['id']."'>".$row['id']."</td>
                            <td class='viewPet' data-id='".$row['id']."'>
                              <img src='".$image."'  height='50px' width='100px'>

                              <button href='#editPhoto' 
															data-id='".$row['id']."' data-toggle='modal' 
															class='photo btn btn-xs btn-success'>
														  <i class='fa fa-edit'></i> 
                            </button>

                            </td>

                            <td class='viewPet' data-id='".$row['pet_id']."'>".$row['pet_id']."</td>
                            <td>".$row['owner_id']."</td>
                            
                            <td class='viewPet' data-id='".$row['id']."'><p>".$row['pet_note']."</p></td>
                            <td>".$row['date']."</td>
                            <td>
                            <button href='#editNote' 
                              data-id='".$row['id']."' data-toggle='modal' 
															class='edit btn btn-sm btn-success'>
														  <i class='fa fa-edit'></i> Edit Note
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
  
      <?php include 'medical_history_modal.php'; ?>
</div>
<!-- ./wrapper -->

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

    $(document).on('click', '.photo', function(e){
      e.preventDefault();
      $('#editPhoto').modal('show');
      var id = $(this).data('id');
      getNote(id);
    });

    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#editNote').modal('show');
      var id = $(this).data('id');
      getNote(id);
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
          $('.id').val(response.id);

          $('.petID').val(response.pet_id);
          $('.ownerID').val(response.owner_id);

          $('.pNote').html(response.pet_note);
          $('.pNote').val(response.pet_note);


        }
      });
    }
    
  });


</script>
</body>
</html>
