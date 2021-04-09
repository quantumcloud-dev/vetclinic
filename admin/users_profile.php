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
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
            	<form class="form-horizontal" method="POST" 
                action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <h3>Client ID: <a class="cId"></a></h3>
                <h3>FullName: <a class="cName"></a></h3>
                <h3>Address: <a class="cAddress"></a></h3>
                <h3>Contact Info: <a class="cContact"></a></h3>
                <h3>Email: <a class="cEmail" href="users_profile.php"></a></h3>
                <h3>Date Created: <a class="cCreated"></a></h3>
                <hr>
         
          	</div>
          	<div class="modal-footer">
            
            	
            	</form>
          	
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

  function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'users_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cId').html(response.id);
      $('.cName').html(response.firstname+' '+response.lastname);
      $('.cAddress').html(response.address);
      $('.cContact').html(response.contact_info);
      $('.cEmail').html(response.email);
      $('.cCreated').html(response.created_on);
    }
  });
}

//   $function getAge($date) {
//     return intval(date('Y', time() - strtotime($date))) - 1970;
// }
});




</script>
</body>
</html>
