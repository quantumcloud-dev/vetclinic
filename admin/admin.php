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
        Doctors
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Doctors</li>
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
                    <i class='fa fa-plus'></i> Add Doctor
                </button>
            </div>
            <div class="box-body">
           
              <table id="history" class="table table-striped table-bordered table-hover bg-gray"  style ="width:100%">
                <thead>
                   
                    <th>Photo</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Contact Info</th>
                    <th>Email</th>
                    <th>Tools</th>
                </thead>
            
                <tbody>
                <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM users where type = 1 and access!=1");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        echo "<tr>
                              
                                <td>
                                <img class='photos' src='".$image."' width='50' height='50'>
                                </td>
                                <td>".$row['firstname']."</td>
                                <td>".$row['middlename']."</td>
                                <td>".$row['lastname']."</td>
                                <td>".$row['birthdate']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['contact_info']."</td>
                                <td>".$row['email']."</td>
                                <td>
                                    <button href='#editDoctor' 
                                        data-id='".$row['id']."' data-toggle='modal' 
                                        class='edit btn btn-sm btn-success'>
                                        <i class='fa fa-edit'></i> Edit
                                    </button>

                                    <button href='#deleteDoctor' 
                                        data-id='".$row['id']."' data-toggle='modal' 
                                        class='delete btn btn-sm btn-danger'>
                                        <i class='fa fa-minus-circle'></i> Remove
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
      <?php  include 'admin_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.add', function(e){
    e.preventDefault();
    $('#addDoctor').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#editDoctor').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#deleteDoctor').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'admin_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){

        $('.id').val(response.id)
     

        $('.firstname').val(response.firstname)
        $('.middlename').val(response.middlename)
        $('.lastname').val(response.lastname)
        $('.birthdate').val(response.birhtdate)
        $('.address').val(response.address)
        $('.contact').val(response.contact_info)

        $('.fullname').html(response.firstname+' '+response.middlename+' '+response.lastname)
       
      
    
    }
  });
}
</script>
</body>
</html>
