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
            Messages
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Messages</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                <table id="messages" class="table table-bordered table-striped table-hover bg-gray" style="width:100%">
                    <thead>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Receiver</th>
                        <th>Message From</th>
                        <th>Message</th>
                        <th>Date</th>
                    </thead>
                    <tfoot>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Receiver</th>
                        <th>Message From</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tfoot>
               
                    <tbody>
                    
                    <?php
                        $conn = $pdo->open();

                        try{
                        $stmt = $conn->prepare("SELECT * FROM messages order by date DESC");
                        $stmt->execute();
                        foreach($stmt as $row){
                        
                            if($row['message_status']=='Deleted'){
                                $status = "<p class='text-center' style='color:white; background-color:red;'>
                                ".$row['message_status']."
                                </p>";
                            }
                            if($row['message_status']=='Sent'){
                                $status = "<p class='text-center' style='color:white; background-color:Blue;'>
                                ".$row['message_status']."
                            </p>";
                            }
                            if($row['message_status']=='Replied'){
                                $status = "<p class='text-center' style='color:white; background-color:green;'>
                                ".$row['message_status']."
                                </p>";
                                }
                            echo "
                            <tr >
                                <td>".$row['id']."</td>
                                <td>".$status."</td>
                                <td class='viewUser text-center' data-id='".$row['owner_id']."'>".$row['owner_id']."</td>
                                <td class='viewUser text-center' data-id='".$row['owner_id']."'>".$row['message_from']."</td>
                                <td class='viewMessage' data-id='".$row['id']."'>".$row['message']."</td>
                               
                            
                                <td><a>".$row['date']."</a></td>
                            
                            
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
        <?php include 'messages_modal.php'; ?>

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
            
            $(document).on('click', '.viewMessage', function(e){
            e.preventDefault();
            $('#viewMessage').modal('show');
            var id = $(this).data('id');
            getMessage(id);
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
                    
                    
                    }
                });
            }

            function getMessage(id){
                
                $.ajax({
                    type: 'POST',
                    url: 'messages_row.php',
                    data: {id:id},
                    dataType: 'json',
                    success: function(response){

                        $('.messageID').val(response.id);

                        $('.from').html(response.message_from);
                        $('.text').html(response.message);
                        $('.date').html(response.date);
                    
                    }
                });
            }

        });

    </script>
</body>
</html>
