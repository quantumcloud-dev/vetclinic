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
        Pets
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pets</li>
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
        if(isset($_SESSION['noteSuccess'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['noteSuccess']."
            </div>
          ";
          unset($_SESSION['noteSuccess']);
        }
        if(isset($_SESSION['petSuccess'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['petSuccess']."
            </div>
          ";
          unset($_SESSION['petSuccess']);
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
              <table id="pets" class="table table-bordered table-striped table-hover bg-gray" style="width:100%">
                <thead>
                    <th>Pet ID</th>
                    <th>Photo</th>
                    <th>Owner ID</th>
                    <th>Pet Name</th>
                    <th>Weight</th>
                    <th>Temperature</th>
                    <th>Class</th>
                    <th>Breed</th>
                    <th>Diagnosis</th>
                    <th>Tools</th>
                </thead>
                
                <tbody>
                  <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM pets");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['pet_photo'])) 
                        ? '../images/'.$row['pet_photo'] 
                        : '../images/profile.jpg';
                       
                        echo "
                          <tr class='text-center'>
                          
                           
                            <td class='viewPet' data-id='".$row['id']."'>".$row['id']."</td>
                            <td class='viewPet' data-id='".$row['id']."'>
                              <img src='".$image."' height='50px' width='100px'>
                            </td>
                            <td>".$row['owner_id']."</td>
                            <td>".$row['pet_name']."</td>
                            <td>".$row['pet_weight']."</td>
                            <td>".$row['pet_temp']."°C</td>
                            <td>".$row['pet_class']."</td>
                            <td>".$row['pet_breed']."</td>
                            <td>
                            <button href='#uploadDiagnosis' 
                              data-id='".$row['id']."' data-toggle='modal' 
															class='upload btn btn-sm btn-primary'>
														  <i class='fa fa-plus'></i> Notes
                            </button>
                            </td>

                            <td>
                            <button href='#editPet' 
                              data-id='".$row['id']."' data-toggle='modal' 
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
                
                <tfoot>
                    <th>Pet ID</th>
                    <th>Photo</th>
                    <th>Owner ID</th>
                    <th>Pet Name</th>
                    <th>Weight</th>
                    <th>Temperature</th>
                    <th>Class</th>
                    <th>Breed</th>
                    <th>Diagnosis</th>
                    <th>Tools</th>
                </tfoot>

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

  function getDocuments(id){
      $.ajax({
        type: 'POST',
        url: 'pets_docu_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          $('.pId').html(response.id);
          $('.petID').html(response.id);
          $('.ownerID').html(response.owner_id);
          $('.pTemp').html(response.pet_temp);
          $('.pKilo').html(response.pet_weight);
          $('.pDocu').html(response.pet_document);
          $('.date').html(response.date);
              
          
        }
      });
  }

  $(function(){

      $(document).on('click', '.viewPet', function(e){
      e.preventDefault();
      $('#viewPet').modal('show');
      var id = $(this).data('id');
      getNote(id);

      });

      function getNote(id){
      $.ajax({
        type: 'POST',
        url: 'pets_note_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){

          $('.pNote').html(response.pet_note);
        }
      });
      }

  });

</script>
</body>
</html>
