<div class="modal fade" id="viewMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
             <h4 class="modal-title">Message from:  <i><b class="from"></b></i></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="inbox_delete.php">

                <input type="hidden" class="messageID" name="id">
                <div class="text-center">
                   
                    <h4><p class="text"></p></h4>
                    <a class="date"></a>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">
                <i class="fa fa-close"></i> Close</button>
         
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red">
              <i><h4 class="modal-title text-center">Are you sure you want to delete the message?</h4></i>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="inbox_delete.php">

                <input type="hidden" class="messageID" name="id">
                <div class="text-center">
                   
                    <h4><p class="text"></p></h4>
                    <a class="date"></a>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                <i class="fa fa-close"></i> No</button>
              <button type="submit" class="btn btn-danger btn-flat" name="message_delete">
                <i class="fa fa-trash"></i> Yes</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Message -->
<div class="modal fade" id="replyMessage">
    <div class="modal-dialog ">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
            	<h4 class="modal-title">Replying to : <strong> <i class="from"></strong></i></h4>
          	</div>
              
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="inbox_reply.php">
                    <div class='col-sm-12 bg-gray'>
                    <div class="form-group col-sm-12">
                        <label for="">Message:</label>
                        <br>
                        <textarea name="message"
                        rows="5" 
                        placeholder="Type here. . . " style="width:100%; resize:none"></textarea>
                    </div>
                    <input type="hidden" name="senderID" class="from" id="ownID">
                    <input type="hidden" name="userID" class="owner_ID" id="user">
                    </div>
                </div>
        
                <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat" name="send"><i class="fa fa-send"></i> Send</button>
                
        
            	</form>
          	</div>
        </div>
    </div>
</div><!-- /Message -->