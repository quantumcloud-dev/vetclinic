<!-- User View -->
<div class="modal fade" id="viewUser">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><h4><strong>Name: <i class="cName"></strong></h4></i></h4>
          	</div>
          	<div class="modal-body col-lg-12 col-sm-12 col-xs-12 bg-gray">
            	<form class="form-horizontal">
                <h4 class="col-sm-6 col-xs-6">Client ID: <a class="cId" name="cId"></a></h4>
                <h4 class="col-sm-6 col-xs-6">Date Created: <a class="cCreated"></a></h4>
                <h4 class="col-sm-6 col-xs-6">Email: <a class="cEmail"></a></h4>
                <h4 class="col-sm-6 col-xs-6">Contact Number: <a class="cContact"></a></h4>
                <h4 class="col-sm-12 col-xs-12">Address: <a class="cAddress"></a></h4>
           
               
                <input type="hidden" name="ownerID" id="">
         
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- /User View -->

<!-- Message -->
<div class="modal fade" id="messageUser">
    <div class="modal-dialog ">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
            	<h4 class="modal-title">Send to : <strong> <i class="cName"></strong></i></h4>
          	</div>
              
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="users_message.php">
                    <div class='col-sm-12 bg-gray'>
                    <div class="form-group col-sm-12">
                        <label for="">Message:</label>
                        <br>
                        <textarea name="message"
                        rows="5" 
                        placeholder="Type here. . . " style="width:100%; resize:none"></textarea>
                    </div>
                    <input type="hidden" name="ownerID" class="ownerID" id="ownID">
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

<!-- Message -->
<div class="modal fade" id="receiptUser">
    <div class="modal-dialog modal-lg modal-xs">
        <div class="modal-content">
          	<div class="modal-header bg-blue">
              <button  type="button" 
                            class="btn btn-xs btn-default pull-right" data-dismiss="modal">
                            <i class="fa fa-close"></i></button>
            	<h4 class="modal-title">Receipt for : <strong> <i class="cName"></strong></i></h4>
          	</div>
              
            <style>
                tr{
                    padding:1em;
                }
                input{
                    text-align:center;
                }
            
        
            </style>
          	<div class="modal-body modal-lg text-center">
              <div class="box">
            	<form class="form-horizontal" method="POST" action="receipt_add.php">
                <!-- <div class=""><i class="ownerID"></i></div> -->
                <input type="hidden" name="ownerID" class="ownerID" id="ownID">
                
                    <tr>
                        <label class="col-lg-3 col-sm-3 col-xs-6" for="">Item/Service</label>
                        <label class="col-lg-3 col-sm-3 col-xs-6" for="">Description</label>
                        <label class="col-lg-1 col-sm-2 col-xs-6 " for="">Quantity</label>
                        <label class="col-lg-2 col-sm-2 col-xs-6" for="">Amount</label>
                        <label class="col-lg-3 col-sm-2 col-xs-12" for="">Total Amount</label>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <select name="item" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6 col-xs-6" type="number" id="quantity" name="quantity" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6 col-xs-6" type="number" id="amount" name="amount" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12 col-xs-12" type="number" id="totalAmount" name="totalAmount" disabled> 
                    </tr>
                    <!-- /Row -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item1" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description1" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6 col-xs-6" type="number" id="quantity1" name="quantity1" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6 col-xs-6" type="number" id="amount1" name="amount1" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12 col-xs-12" type="number" id="totalAmount1" name="totalAmount1" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item2" id="" class="col-lg-3 col-sm-3 col-xs-6 " placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description2" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity2" name="quantity2" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount2" name="amount2" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount2" name="totalAmount2" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item3" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description3" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity3" name="quantity3" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount3" name="amount3" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount3" name="totalAmount3" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item4" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description4" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity4" name="quantity4" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount4" name="amount4" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount4" name="totalAmount4" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item5" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description5" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity5" name="quantity5" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount5" name="amount5" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount5" name="totalAmount5" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item6" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description6" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity6" name="quantity6" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount6" name="amount6" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount6" name="totalAmount6" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item7" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description7" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity7" name="quantity7" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount7" name="amount7" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount7" name="totalAmount7" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item8" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description8" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity8" name="quantity8" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount8" name="amount8" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount8" name="totalAmount8" disabled> 
                    </tr> -->
                    <!-- Row -->
                    <!-- <tr>
                        <select name="item9" id="" class="col-lg-3 col-sm-3 col-xs-6" placeholder="item/service">
                            <option value="">Item/Service</option>
                            <?php include "products.php";?>
                        </select>
            
                        <select name="description9" id="" class="col-lg-3 col-sm-3 col-xs-6">
                            <option value="">Description</option>
                            <?php include "products_description.php";?>
                        </select>
                        <input class="col-lg-1 col-sm-2 col-xs-6" type="number" id="quantity9" name="quantity9" placeholder="0"> 
                        <input class="col-lg-2 col-sm-2 col-xs-6" type="number" id="amount9" name="amount9" placeholder="Enter Amount"> 
                        <input class="col-lg-3 col-sm-2 col-xs-12" type="number" id="totalAmount9" name="totalAmount9" disabled> 
                    </tr> -->
                    <!-- /Row -->
                    
                    <tr>
                        <div class="text-center">
                            <label class="col-xs-2">Total:</label>
                            <input class="col-xs-8" type="text" id="totalFinal" name="totalFinal" disabled> </div>
                            
                        </div>
                    </tr>
                    
                   
                    <div>
                    <button  type="button" onclick="myFunction()" 
                                class="btn btn-default btn-sm bg-green">
                                <i class="fa fa-calculator"></i></button>
                    <button  type="button" 
                            class="btn btn-default btn-sm" data-dismiss="modal">
                            <i class="fa fa-close"></i> Cancel</button>
                        <button  type="submit" 
                            class="btn btn-sm bg-blue" name="receipt">
                            <i class="fa fa-credit-card"></i> Receipt</button>
                        
                      
                    </div>
                   
                    
               </form>
              
          	</div>
        </div>
    </div>
</div><!-- /Message -->
<script>
    function myFunction() {

        var totalAmount = 0;
        var totalAmount1 = 0;
        var totalAmount2 = 0;
        var totalAmount3 = 0;
        var totalAmount4 = 0;
        var totalAmount5 = 0;
        var totalAmount6 = 0;
        var totalAmount7 = 0;
        var totalAmount8 = 0;
        var totalAmount9 = 0;

        var totalFinal = 0;

        var quantity = document.getElementById("quantity").value;
        var amount = document.getElementById("amount").value;

        var quantity1 = document.getElementById("quantity1").value;
        var amount1 = document.getElementById("amount1").value;

        var quantity2 = document.getElementById("quantity2").value;
        var amount2 = document.getElementById("amount2").value;

        var quantity3 = document.getElementById("quantity3").value;
        var amount3 = document.getElementById("amount3").value;

        var quantity4 = document.getElementById("quantity4").value;
        var amount4 = document.getElementById("amount4").value;

        var quantity5 = document.getElementById("quantity5").value;
        var amount5 = document.getElementById("amount5").value;

        var quantity6 = document.getElementById("quantity6").value;
        var amount6 = document.getElementById("amount6").value;

        var quantity7 = document.getElementById("quantity7").value;
        var amount7 = document.getElementById("amount7").value;

        var quantity8 = document.getElementById("quantity8").value;
        var amount8 = document.getElementById("amount8").value;

        var quantity9 = document.getElementById("quantity9").value;
        var amount9 = document.getElementById("amount9").value;
    
        totalAmount = quantity * amount;
        totalAmount1 = quantity1 * amount1;
        totalAmount2 = quantity2 * amount2;
        totalAmount3 = quantity3 * amount3;
        totalAmount4 = quantity4 * amount4;
        totalAmount5 = quantity5 * amount5;
        totalAmount6 = quantity6 * amount6;
        totalAmount7 = quantity7 * amount7;
        totalAmount8 = quantity8 * amount8;
        totalAmount9 = quantity9 * amount9; 

        document.getElementById("totalAmount").value = totalAmount;
        document.getElementById("totalAmount1").value = totalAmount1;
        document.getElementById("totalAmount2").value = totalAmount2;
        document.getElementById("totalAmount3").value = totalAmount3;
        document.getElementById("totalAmount4").value = totalAmount4;
        document.getElementById("totalAmount5").value = totalAmount5;
        document.getElementById("totalAmount6").value = totalAmount6;
        document.getElementById("totalAmount7").value = totalAmount7;
        document.getElementById("totalAmount8").value = totalAmount8;
        document.getElementById("totalAmount9").value = totalAmount9;

        document.getElementById("totalFinal").value = totalFinal + totalAmount + totalAmount1
        + totalAmount2 + totalAmount3 + totalAmount4 + totalAmount5 + totalAmount6 + totalAmount7
        + totalAmount8 + totalAmount9 ;
    }
</script>



