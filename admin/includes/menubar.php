<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) 
        ? '../images/'.$admin['photo'] 
        : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    
      <li class="header">REPORTS</li>
        <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>REQUESTS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu header">
          <li><a href="client_request_pending.php"><i class="fa fa-spinner"></i> <span>Pending Requests</span></a></li>
          <li><a href="homeservice.php"><i class="fa fa-home"></i> <span>Home Service</span></a></li>
          <li><a href="clinic.php"><i class="fa fa-user-md"></i> <span>Clinic</span></a></li>
          
        
        </ul>
      </li> 
        
        <!-- Tree view -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>MANAGE</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu header">
          <li><a href="client_request.php"><i class="fa fa-tags"></i> <span>Approved/Rejected</span></a></li>
          <li><a href="tags.php"><i class="fa fa-tags"></i> <span>Show/No-Show</span></a></li>
          <li><a href="users.php"><i class="fa fa-users"></i> <span>Pet Owners</span></a></li>
          <li><a href="pets.php"><i class="fa fa-paw"></i> <span>Pets</span></a></li>
          <li><a href="item_service.php"><i class="fa fa-star"></i> <span>Product and Services</span></a></li>
          <li><a href="admin.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a></li>
        
        </ul>
      </li> 
      


      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>HISTORIES</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu header">
        <li><a href="medical_history.php"><i class="fa fa-flask"></i> <span>Medical History</span></a></li>
        <li><a href="messages.php"><i class="fa fa-commenting"></i> <span>Messages</span></a></li>
        <li><a href="receipts.php"><i class="fa fa-sticky-note-o"></i> <span>Receipt</span></a></li>
       
        
        <!-- <li><a href="notes.php"><i class="fa fa-sticky-note-o"></i> <span>Notes</span></a></li>
        <li><a href="documentations.php"><i class="fa fa-file-text-o"></i> <span>Documents</span></a></li> -->
        
        <li><a href="history.php"><i class="fa fa-history"></i> <span>History</span></a></li>
        </ul>
      </li> 
      <!-- Tree view -->

      <!-- <li class="header">MANAGE</li>
        <li><a href="client_request.php"><i class="fa fa-spinner"></i> <span>Requests</span></a></li>
        <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="pets.php"><i class="fa fa-paw"></i> <span>Pets</span></a></li>
        <li><a href="item_service.php"><i class="fa fa-product"></i> <span>Item/Services</span></a></li>
        <li><a href="admin.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a></li>
        <li><a href="tags.php"><i class="fa fa-tags"></i> <span>Tags</span></a></li> -->

      <!-- <li class="header">HISTORIES</li>
        <li><a href="medical_history.php"><i class="fa fa-flask"></i> <span>Medical History</span></a></li>
        <li><a href="receipts.php"><i class="fa fa-sticky-note-o"></i> <span>Receipt</span></a></li>
        <li><a href="messages.php"><i class="fa fa-commenting"></i> <span>Messages</span></a></li>
        <li><a href="history.php"><i class="fa fa-history"></i> <span>History</span></a></li> -->
      
      

      
    </ul>
  </section>

</aside>