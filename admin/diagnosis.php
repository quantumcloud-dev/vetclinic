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
        Lab Test
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lab Test</li>
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
                    <th>No.</th>
                    <th>Pet ID</th>
                    <th>Photo</th>
                    <th>Datetime</th>
                </thead>
                <tfoot>
                    <th>No.</th>
                    <th>Pet ID</th>
                    <th>Photo</th>
                    <th>Datetime</th>
                </tfoot>

                <tbody>
                  <?php
                    $conn = $pdo->open();
                    try{
                      $stmt = $conn->prepare("SELECT * FROM diagnosis");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) 
                        ? '../images/'.$row['photo'] 
                        : '../images/profile.jpg';
                       
                        echo "
                          <tr class='text-center'>
                            <td class='viewPet' data-id='".$row['id']."'>".$row['id']."</td>
                            <td class='viewPet' data-id='".$row['pet_id']."'>".$row['pet_id']."</td>
                            <td class='viewPet' data-id='".$row['id']."'>
                              <img src='".$image."'  height='50px' width='100px'>
                            </td>
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

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
