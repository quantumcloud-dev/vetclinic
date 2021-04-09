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
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
              <table id="users" class="table table-bordered table-striped bg-gray table-hover " style="width:100%">
                <thead>
                  <th>Client ID</th>
                  <th>Client Profile</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Date Created</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) 
                        ? '../images/'.$row['photo'] 
                        : '../images/profile.jpg';

                        // $status = ($row['status']) 
                        // ? '<span class="label label-success">active</span>' 
                        // : '<span class="label label-danger">not active</span>';

                        // $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                       
                        echo "
                          <tr>
                            <td class='viewUser text-center' data-id='".$row['id']."'>".$row['id']."</td>
                            <td class='viewUser text-center' data-id='".$row['id']."'>
                              <img src='".$image."' height='50px' width='100px'>
                            </td>
                            <td class='viewUser text-center' data-id='".$row['id']."'>".$row['firstname']."</td>
                            <td class='viewUser text-center' data-id='".$row['id']."'>".$row['lastname']."</td>
                            <td class='viewUser text-center' data-id='".$row['id']."'>".$row['email']."</td>
                           
                            <td class='viewUser text-center' data-id='".$row['id']."'>".date('M d, Y', strtotime($row['created_on']))."</td>
                           
                            <td>
                            <button href='#receiptUser' 
                              data-id='".$row['id']."' data-toggle='modal' 
															class='receipt btn btn-sm btn-success'>
														  <i class='fa fa-hand-paper-o'></i> Receipt
                            </button>

                            <button href='#messageUser' 
															data-id='".$row['id']."' data-toggle='modal' 
															class='message btn btn-sm btn-primary'>
														  <i class='fa fa-paper-plane'></i> Message
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
  	<?php include 'includes/footer.php'; ?>
    <?php include 'users_modal.php'; ?>

</div>
<!-- ./wrapper -->
<?php include 'includes/scripts.php'; ?>
<script>

  $(function(){

      $(document).on('click', '.viewUser', function(e){
        e.preventDefault();
        $('#viewUser').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.receipt', function(e){
        e.preventDefault();
        $('#receiptUser').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.message', function(e){
        e.preventDefault();
        $('#messageUser').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      function getRow(id){
      $.ajax({
        type: 'POST',
        url: 'users_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          $('.ownerId').html(response.id);
          $('.pPhoto').html(response.photo);
          $('.cId').html(response.id);
          $('.cName').html(response.firstname+' '+response.lastname);
          $('.cAddress').html(response.address);
          $('.cContact').html(response.contact_info);
          $('.cEmail').html(response.email);
          $('.cCreated').html(response.created_on);

          $('.ownerID').val(response.id);
          $('.ownerID').html(response.id);
        
        
        }
      });
    }

  });

  $(function(){

    $(document).on('click', '.viewUser', function(e){
    e.preventDefault();
    $('#viewUser').modal('show');
    var id = $(this).data('id');
    getPet(id);
    });

    function getPet(id){
    $.ajax({
    type: 'POST',
    url: 'users_pets_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){

      $('.pId').html(response.id);
      $('.pWeight').html(response.pet_weight);
      $('.pTemperature').html(response.pet_temp);
      $('.pBreed').html(response.pet_breed);
      $('.pClass').html(response.pet_class);
    
    }
    });
    }

  });

</script>
</body>
</html>
