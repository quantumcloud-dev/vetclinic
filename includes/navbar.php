<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand"><b>Vet</b>Clinic</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
   
      <div class="collapse navbar-collapse pull-left text-center" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <!-- <li><a href="home.php"><i class="fa fa-home">          </i> Home</a></li> -->
          <li><a href="services.php"><i class="fa fa-star">  </i> Services</a></li>
          <li><a href="pet_profile.php"><i class="fa fa-paw"></i> My Pets</a></li>
          <li><a href="profile.php"><i class="fa fa-user">   </i> My Profile</a></li>
          <li><a href="inbox.php">
          ( 
                <?php
                  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM messages 
                  where owner_id = '$session_id' and message_status ='Sent'");
                  $stmt->execute();
                  $row =  $stmt->fetch();

                  echo "<i>".$row['numrows']."</i>";
                ?> 
                )<i class="fa fa-user">      </i> Inbox</a>
          
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            </a>
         
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <br>
                        <small><i class="fa fa-circle text-success"></i> Online</small>
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                      <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat btn-sm" id="client_profile">Update</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat btn-sm">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
