<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<style>
  p{
    color:white;
  }
  h3{
    color:white;
  }
</style>
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="homeservice.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>Pending Requests</p>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
             
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM requests 
                  where request_status='Pending' and appointment_type='Home Service'");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              <p>- Home Service -</p>
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="clinic.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>Pending Requests</p>
              
              <div class="icon">
                <i class="fa fa-user-md"></i>
              </div>
             
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM requests 
                  where request_status='Pending' and appointment_type='Clinic'");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              <p>- Clinic - </p>
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-loading"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="users.php">
            <div class="small-box bg-purple">
              <div class="inner text-center">
              <p>Number of Pet Owner</p>
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users where type='0'");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              
               
              </div>
              <br>
         
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              </a>
              <a href="users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="pets.php">
            <div class="small-box bg-orange">
              <div class="inner text-center">
              <p>Number of Registered Pet</p>
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM pets");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              
               
              </div>
              <br>
              <div class="icon">
                <i class="fa fa-paw"></i>
              </div>
              </a>
              <a href="pets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">   
          <div class="col-lg-6 col-sm-12 col-xs-12">
            <!-- small box -->
            <a href="">
            <div class="small-box bg-yellow">
              <div class="inner text-center">
              <p>Total Income</p>
                <?php
                  $stmt = $conn->prepare("SELECT SUM(totalAmount) AS sum FROM receipts");
                  $stmt->execute();
                  $row =  $stmt->fetch();
                  $total = $row['sum'];

                  echo "<i><h3>₱".number_format($total,2,'.',',')."</h3></i>";
                ?>
              
               
              </div>
              <br>
              <div class="icon text-center">
                <i class="fa fa-money"></i>
              </div>
              </a>
              <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="client_request.php">
            <div class="small-box bg-green">
            
              <div class="inner text-center">
              <p>Consultation</p>
              
              <div class="icon">
                <i class="fa fa-user-md"></i>
              </div>
             
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM requests 
                  where request_status='Pending' and request_type='Consultation'");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-loading"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="client_request.php">
            <div class="small-box bg-green">
            
              <div class="inner text-center">
              <p>Vaccination</p>
              
              <div class="icon">
                <i class="fa fa-user-md"></i>
              </div>
             
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM requests 
                  where request_status='Pending' and request_type='Vaccination'");
                  $stmt->execute();
                  $urow =  $stmt->fetch();

                  echo "<i><h3>".$urow['numrows']."</h3></i>";
                ?>
              
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-loading"></i></a>
            </div>
          </div>
        </div>

        <!-- -->
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="item_service.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>Vaccine</p>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
             
                <?php
                  $qty = $conn->prepare("SELECT COUNT(*) AS quantity FROM receipts where type='Vaccine'");
                  $qty->execute();
                  $urow =  $qty->fetch();
                  $amount = $conn->prepare("SELECT SUM(totalAmount) as Amount FROM receipts where type='Vaccine' ");
                  $amount->execute();
                  $row =  $amount->fetch();

                  echo "<p>QUANTITY = ".$urow['quantity']."</p>
                  <p>TOTAL AMOUNT = ₱".number_format($row['Amount'],2,'.',',')."</p>";
                ?>
              
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="item_service.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>Groom</p>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
             
                <?php
                  $qty = $conn->prepare("SELECT COUNT(*) AS quantity FROM receipts where type='Groom'");
                  $qty->execute();
                  $urow =  $qty->fetch();
                  $amount = $conn->prepare("SELECT SUM(totalAmount) as Amount FROM receipts where type='Groom' ");
                  $amount->execute();
                  $row =  $amount->fetch();

                  echo "<p>QUANTITY = ".$urow['quantity']."</p>
                  <p>TOTAL AMOUNT = ₱".number_format($row['Amount'],2,'.',',')."</p>";
                ?>
              
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="item_service.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>CBC</p>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
             
                <?php
                  $qty = $conn->prepare("SELECT COUNT(*) AS quantity FROM receipts where type='CBC'");
                  $qty->execute();
                  $urow =  $qty->fetch();
                  $amount = $conn->prepare("SELECT SUM(totalAmount) as Amount FROM receipts where type='CBC' ");
                  $amount->execute();
                  $row =  $amount->fetch();

                  echo "<p>QUANTITY = ".$urow['quantity']."</p>
                  <p>TOTAL AMOUNT = ₱".number_format($row['Amount'],2,'.',',')."</p>";
                ?>
              
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <a href="item_service.php">
            <div class="small-box bg-blue">
            
              <div class="inner text-center">
              <p>BLOOD CHEM</p>
              <div class="icon">
                <i class="fa fa-star"></i>
              </div>
             
                <?php
                  $qty = $conn->prepare("SELECT COUNT(*) AS quantity FROM receipts where type='BLOOD CHEM'");
                  $qty->execute();
                  $urow =  $qty->fetch();
                  $amount = $conn->prepare("SELECT SUM(totalAmount) as Amount FROM receipts where type='BLOOD CHEM' ");
                  $amount->execute();
                  $row =  $amount->fetch();

                  echo "<p>QUANTITY = ".$urow['quantity']."</p>
                  <p>TOTAL AMOUNT = ₱".number_format($row['Amount'],2,'.',',')."</p>";
                ?>
              
                
              </div>
              </a>
              <a class="small-box-footer">
            More info 
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
            <canvas id="bar"></canvas>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <canvas id="pie"></canvas>
          </div>
        </div>
         
        </div>
        
      </section>
      
    </div>
      <?php include 'includes/footer.php'; ?>
    

  </div>

<?php include 'includes/scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</body>
</html>
<script>

var ctx = document.getElementById('bar').getContext('2d');


<?php 
// 

  // $stmt = $conn->prepare("SELECT MONTHNAME(date) AS Month FROM receipts");
  // $stmt->execute();
  // $row =  $stmt->fetch();
  ?>

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June',
          'July', 'August', 'September', 'October', 'November', 'December'],
         
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30,
             45, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});

var ctx = document.getElementById('pie').getContext('2d');

var homeservice = <?php 

$stmt = $conn->prepare("SELECT Count(*) AS HomeService FROM histories where appointment_type='Home Service'");
$stmt->execute();
$row =  $stmt->fetch();
echo "".$row['HomeService']."";

?>;

var clinic = <?php 

$stmt = $conn->prepare("SELECT Count(*) AS clinic FROM histories where appointment_type='Clinic'");
$stmt->execute();
$row =  $stmt->fetch();
echo "".$row['clinic']."";

?>;

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['HomeService', 'Clinic'],
         
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['pink','purple'],
            borderColor: 'rgb(255, 99, 132)',
            data: [homeservice, clinic]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
