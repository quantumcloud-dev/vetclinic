<?php
    // include 'AdminCommand.php';
    // $AdminBarUser           =   $_SESSION["AdminUser"];        $AdminBarpass     =$_SESSION["AdminUserpass"];
    // $search_logins	        =   "SELECT * FROM users where user_name='$AdminBarUser' and user_pass='$AdminBarpass'";
    // $search_Resultlogins	=   mysqli_query($connect,$search_logins);
    // while($rowuser=mysqli_fetch_array($search_Resultlogins))
    // {	 	
    //     $AdminBUser         =	$rowuser["user_name"];  	$AdminBpass         = 	$rowuser["user_pass"];
    //     $AdminNickName      = 	$rowuser["NickName"];       $AdminPosition      = 	$rowuser["Position"];     	
    // }
    // if(!empty($AdminBUser) and !empty($AdminBpass)){
    //         $AdminLogComment=   "Welcome to Dashboard $AdminPosition $AdminNickName"; 
    //     if (empty($_SESSION["AdminFiltersearch"])) {
	// 		$asc_query                  =   "SELECT * FROM Residents order by ID DESC";
    //         $remarkquerydata            =   "SELECT * FROM comments order by ID DESC";
	// 		$result                     =   mysqli_query($connect,$asc_query);
    //         $dataremark                 =   mysqli_query($connect,$remarkquerydata);
	// 	}else{
    //         $filtersearch=$_SESSION["AdminFiltersearch"];
	// 		$asc_query                  =   "SELECT * FROM `Residents` WHERE CONCAT 
    //                                         (`BARID`,`FFID`,`LastName`,`FirstName`,`CompleteName`,`PHONENUMBER`,`Street`,`Recstatus`,`Gender`,`CivilStatus`) 
    //                                         LIKE '%".$filtersearch."%'";
    //         $search_Resultremarkid	    =   mysqli_query($connect,$asc_query);	
    //         while($rowuserid=mysqli_fetch_array($search_Resultremarkid))
    //         {	 	
    //             $RemBUserID             =	$rowuserid["BARID"];  
    //         }
    //         $remarkquerydata            =   "SELECT * FROM comments where BarIDnum='$RemBUserID' order by ID DESC";	
	// 		$result                     =   mysqli_query($connect,$asc_query);
    //         $dataremark                 =   mysqli_query($connect,$remarkquerydata);
	// 	}
    //     $_SESSION["AdminUser"]          =   "$AdminBUser";              $_SESSION["AdminUserpass"]  ="$AdminBpass";
    // }else{
    //     // $_SESSION["AdminComment"]       =   "Please Login first";       header("location:../Resident/AdminLogin") ; 
    // } 

?>
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        color: #5b656c;
        font-family: "Times New Roman", Times, serif;
        font-size: 13px;
        line-height: 1.3em; 
        background-color: #fff;
        background-image:url("Background.jpg");
        background-size: cover;
        background-attachment:fixed;
    }
    body::-webkit-scrollbar {
        display: none;
    }
</style>
<!DOCTYPE html PUBLIC>
<html>
<head>
<title> Dashboard </title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    #Background-Wrapper{
        width:100%;
        height:100%;
        color:white;
        font-size:1rem;
        background:transparent;
    }
    .BG-Header{
        width:98%;
        margin:0 1%;
        height:10%;
        max-width:1400px;
        max-height:100px;
        display:flex;
        justify-content:space-between;
    }
    .Header-logo{
        width:10%;
        height:100%;
        max-height:100px;
        max-width:100px;
    }
    .Header-logo img{
        height:94%;
        border-radius:50%;
        margin:2% 1%;
        object-fit: contain;
    }
    .Header-Name{
        width:20%;
        height:100%;
        max-height:100px;
        max-width:400px;
    }
    .Header-Name h1{
        font-size:1rem;
        color:#FC0FC0;
        margin:10px auto;
        font-weight:bold;
        text-align:left;
    }
    .Header-Name p{
        font-size:1rem;
        color:#fff;
        margin:0 auto;
        text-align:left;
    }
    .Header-Nav1{
        width:20%;
        height:100%;
        max-height:100px;
        max-width:500px;
        display:flex;
        justify-content:space-between;
    }
    .Header-Nav2{
        width:50%;
        height:100%;
        max-height:100px;
        max-width:800px;
        display:flex;
        justify-content:space-between;
    }
    .Nav-btn{
        width:25%;
        height:50%;
        max-height:50px;
        max-width:200px;
        margin-top:15px;
        text-align:center;
        color:black;
    }
    .Nav-btn input[type="submit"]{
        width:98%;
        margin:0px 1%;
        height:100%;
        background:transparent;
        color:#fff;
        font-weight:bold;
        font-size:0.8rem;
        border:none;
    }
    .Nav-btn input[type="submit"]:hover{
        background:#FC0FC0;
        color:black;
        border:1px solid #FC0FC0;
    }
    .BG-Context{
        width:98%;
        margin:0 1%;
        height:80%;
        max-width:1400px;
        max-height:600px;  
    }
    
    .Context-gender{
        width:100%;
        height:100px;
        display:flex;
        justify-content:space-between;
    }
    .gender-filter{
        width:25%;
        height:100%;
    }
    .filter-field{
        width:100%;
        height:60px;
        margin-top:10px;
        border:3px solid #FC0FC0; 
        border-radius:20px;
    }
    .field-field-filter{
        width:96%;
        height:40px;
        margin:10px 2%;
        display:flex;
        justify-content:space-between;
    }
    .filter-data{
        width:80%;
        height:20px;
        margin:5px 0px
    }
    .filter-data input[type="text"]{
        width:100%;
        margin:0px 0%;
        height:30px;
        background:#fff;
        color:black;
        font-weight:bold;
        font-size:0.8rem;
        border:none;
        border-top-left-radius:5px;
        border-bottom-left-radius:5px;
        padding:0 15px;
    }
    .filter-databtn{
        width:20%;
        height:20px;
        margin:5px 0px
    }
    .filter-databtn .btnfilter{
        width:100%;
        height:30px;
        background:#FC0FC0;
        border:1px solid #FC0FC0;
        color:black;
        border-top-right-radius:5px;
        border-bottom-right-radius:5px;
    }
    .filter-navagation{
        width:50%;
        height:450px;
        margin:0px 20px;
        border:3px solid #FC0FC0;
        border-top:none;
    }
    .navagation-field{
        width:100%;
        height:74px;
        margin:0px 0px;
        border:none;
        border-bottom:1px solid #FC0FC0;
    }
    .navagation-field input[type="submit"]{
        width:100%;
        margin:0px 0%;
        height:100%;
        background:rgba(30, 30, 30, 1);
        color:#fff;
        font-weight:bold;
        font-size:0.8rem;
        border:none;
    }
    .navagation-field input[type="submit"]:hover{
        background:#FC0FC0;
        color:black;
        border:1px solid #FC0FC0;
    }
    .navagation-fieldfocus{
        width:100%;
        height:74px;
        margin:0px 0px;
        border:none;
        border-bottom:1px solid #FC0FC0;
    }
    .navagation-fieldfocus input[type="submit"]{
        width:100%;
        margin:0px 0%;
        height:100%;
        background:#FC0FC0;
        color:black;
        font-weight:bold;
        font-size:0.8rem;
        border:none;
    }
    .navagation-fieldfocus input[type="submit"]:hover{
        background:rgba(30, 30, 30, 1);
        color:#fff;
        border:1px solid #FC0FC0;
    }
    .gender-comment{
        width:50%;
        height:100%;
    }
    .comment-field{
        width:99%;
        height:40px;
        margin:30px 1%;
        border:none;
        border-top:3px solid #000fff;
        text-align:center;
        color:red;
    }
    comment-field p{
        width:96%;
        margin:1% 2%;
        font-weight:bold;
        color:red;
        background:transparent;
        font-size:1rem;
        text-align:center;
    }
    .gender-Ids{
        width:25%;
        height:100%;
    }
    .Ids-field{
        width:100%;
        height:100%;
        border:3px solid #FC0FC0;
        border-radius:20px;
        background:rgba(30, 30, 30, 1);
    }
    .Ids-Ids-field{
        width:90%;
        height:20px;
        margin:5px 5%;
        display:flex;
        justify-content:space-between;
    }
    .Ids-data-icon{
        width:10%;
        height:20px;
        background:transparent;
        color:#00ffff;
        border:none;
        border-left:1px solid gray;
        border-bottom:1px solid gray;
        text-align:center;
    }
    .Ids-data-icon p{ 
        width:90%;
        margin:0px 5%;
        background:transparent;
        color:black;
    }
    .Ids-data-icon .iconnav{
        background:transparent;
        color:#FC0FC0;
    }
    .Ids-data-field{
        width:80%;
        height:20px;
        background:transparent;
        color:#fff;
        border:none;
        border-left:1px solid gray;
        border-bottom:1px solid white;
        text-align:center;
    }
    .Ids-data-field p{
        background:transparent;
        color:white;
        width:90%;
        margin:0px 5%;
        height:20px;
        border:none;
        font-size:1rem;
        text-align:left;
        font-weight:bold;
    }
    .Ids-data-btn{
        width:10%;
        height:20px;
        background:#FC0FC0;
        border:none;
        border-left:1px solid gray;
        border-bottom:1px solid gray;
        text-align:center; 
    }
    .Ids-data-btn .btnresident{
        width:100%;
        height:20px;
        background:#FC0FC0;
        border:1px solid #FC0FC0;
        color:black;
    }
    .Ids-remarks{
        background:rgba(30, 30, 30, 0.7);
        width:90%;
        height:420px;
        margin:0px 20px;
        border:none;
        border-left:3px solid #FC0FC0; 
        border-bottom:3px solid #FC0FC0;
    }
    .remarks-input{
        width:98%;
        margin:5px 1%;
        height:120px;
        border:none;
        border-bottom:2px solid gray;
    }
    .remarks-input .commentarea{
        width:98%;
        height:75px;
        margin:5px 1%;
        border:1px solid #FC0FC0;
        background:transparent;
        color:#00ffff;
        border-radius:10px; 
    }
    .remarks-input .btnremark{ 
        width:80px;
        background:transparent;
        height:30px;
        float:right;
        text-align:center;
        color:white;
        font-weight:bold;
        border:none;
        font-size:0.5rem;
        margin:0px 1%;
    }
    .remarks-data{
        width:98%;
        margin:0px 1%;
        height:280px;
        overflow:scroll;
    }
    .remarks-data::-webkit-scrollbar {
        display: none;
    }
    .remarks-content{
        width:98%;
        margin:0px 1%;
        height:180px;
        background:rgba(30, 30, 30, 0.7);
        color:white;
    }
    .content-remark-name{
        width:100%;
        height:20px;
        background:#FC0FC0;
        border:none;
        border-bottom:1px solid gray;
        color:black;
        margin:0px 0px;
        font-size:0.8rem;
        overflow:hidden;
        display:flex;
        justify-content:space-around;
    }
    .remark-date{
        width:20%;
        height:20px;
    }
    .remark-date p{
        margin:0px 0px;
        padding:2px 5px;
    }
    .remarktype{
        width:80%;
        height:20px;
    }
    .remarktype p{
        margin:0px 0px;
        text-align:right;
        padding:0 10px
    }
    .content-remark-data{
        width:100%;
        height:150px;
        margin:0px 0px;
        border:none;
        border-bottom:1px solid gray;
        display:flex;
        justify-content:space-around;
        background:#fff;
    }
    .remarks-profile{
        width:20%;
        height:150px;
        margin:0px 0px;
        background:#fff;
        overflow:hidden;
        border:none;
        border-right:2px solid gray;
        text-align:center;
    }
    .remarks-profile img{
        height:80%;
        width:auto;
        max-width:80%;
        background:#fff;
        margin:10% auto;
        object-fit: contain;
    }
    .remarks-data-area{
        width:80%;
        height:150px;
        margin:0px 0px;
        background:#fff;
        overflow:hidden;
    }
    .data-recordremark{
        background:transparent;
        color:black;
        font-size:0.9rem;
        margin:0px 0px;
        padding:0px 0px;
        height:18px;
    }
    .data-recordremark p{
        margin:0px 0px;
        padding:2px 5px;
    }
    .Context-data{
        width:100%;
        height:500px;
        display:flex;
    }
    .dashboard-databox{
        width:60%;
        height:480px; 
        border:none;
        background:rgba(30, 30, 30, 0.7);
        color:#00ffff;
        border-bottom:3px solid #000fff;
        border-top:2px solid gray;
        border-left:0.5px solid gray;
        border-right:0.5px solid gray;
        margin:0 15%;
        border-radius:20px;
        overflow:hidden;
        display:flex;
    }
    .dashboard-databoxlegend{
        width:40%;
        height:100%;
        border:none;
        background:transparent;
        border-right:1px solid #FC0FC0;
        overflow:scroll;
    }
    .dashboard-databoxcontent{
        width:60%;
        height:100%;
        border:none;
        background:transparent;
        overflow:scroll;
    }
    .dashboard-databoxcontent::-webkit-scrollbar {
        display: none;
    }
    .BG-Footer{
        width:98%;
        margin:0 1%;
        height:10%;
        max-width:1400px;
        max-height:100px;  
    }
</style>
<div id="Background-Wrapper">
<form method="POST" action="">
	<div class="BG-Header">
        <div class="Header-logo">
            <img src="Resources/Images/logo.jpg">
        </div>
        <div class="Header-Name">
            <h1><?php echo $BarangayName;?> </h1>
            <p><?php echo $CityName;?></p>
        </div>
        <div class="Header-Nav1">
        </div>
        <div class="Header-Nav2">
             <div class="Nav-btn">
            </div>
            <div class="Nav-btn">
            </div>
            <div class="Nav-btn">
            </div>
            <div class="Nav-btn">
                <input type="submit" name="AdminLogout" value="LOGOUT">
            </div>
        </div>
    </div>
</form>
    <div class="BG-Context">
        <div class="Context-gender">
            <div class="gender-filter">
                <div class="filter-field">
                <form method="POST" action="" autocomplete="off">
                    <div class="field-field-filter">
                        <div class="filter-data">
                            <input type="text" name="Afilterfield"  value="<?php echo $Adminfilterdata;?>" Placeholder="Filter">
                        </div>
                        <div class="filter-databtn">
                            <button type="submit" name="Afilterdata" class="btnfilter"><i class="fa fa-filter" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="filter-navagation">
                    <form method="POST" action="">
                        <div class="navagation-fieldfocus">
                            <input type="submit" name="ADashboard"  value="DASHBOARD">
                        </div>
                        <div class="navagation-field">
                            <input type="submit" name="AResident"   value="RESIDENT">
                        </div>
                        <div class="navagation-field">
                            <input type="submit" name="AMessages"   value="MESSAGES">
                        </div>
                        <div class="navagation-field">
                            <input type="submit" name="AMyAccount" value="ACCOUNT">                            
                        </div>
                        <div class="navagation-field">
                            <input type="submit" name="AArchieves" value="">
                        </div>
                        <div class="navagation-field" style="border:none">
                            <input type="submit" name="ABlotter"    value="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="gender-comment">
                <div class="comment-field">
                    <?php 
                        if (empty($_SESSION["AdminLogComment"])){
                            $AdminmessagesComment   =$AdminLogComment;
                        }else{
                            $AdminmessagesComment   =$_SESSION["AdminLogComment"]; 
                        }
                    ?>
                    <p><?php echo $AdminmessagesComment;?></p>
                </div>
            </div>
            <div class="gender-Ids">
                <div class="Ids-field">
                <form method="POST" action="">
                    <div class="Ids-Ids-field" style="margin-top:15px">
                        <div class="Ids-data-icon" style="border-top:1px solid #fff;border-top-left-radius:5px;">
                            <p><i class="fa fa-home iconnav"></i></p>
                        </div>
                        <div class="Ids-data-field" style="border-top:1px solid #fff">
                            <?php 
                                if (empty($_SESSION["AdminHHID"])){
                                    $AdminHHID   =  "";                         
                                }else{
                                    $AdminHHID   =  $_SESSION["AdminHHID"];      
                                }
                            ?>
                            <p><?php echo $AdminHHID;?></p>    
                        </div>
                        <div class="Ids-data-btn" style="border-top:1px solid #fff;border-top-right-radius:5px;">
                            <button type="submit" name="ANewResident" class="btnresident"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="Ids-Ids-field">
                        <div class="Ids-data-icon">
                            <p><i class="fa fa-users iconnav"></i></p>
                        </div>
                        <div class="Ids-data-field">
                            <?php 
                                if (empty($_SESSION["AdminHHID"])){
                                    $AdminreadonlyFFID  ="Yes";
                                }else{
                                    $AdminreadonlyFFID  ="No";    
                                }
                            ?>
                            <p><?php echo $AdminFFID;?></p>
                        </div>
                        <div class="Ids-data-btn">
                            <button type="submit" name="ANewFamily" disabled="<?php echo $AdminreadonlyFFID;?>" 
                                    class="btnresident"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="Ids-Ids-field">
                        <div class="Ids-data-icon" style="border-bottom-left-radius:5px;">
                            <p><i class="fa fa-user iconnav"></i></p>
                        </div>
                        <div class="Ids-data-field">
                            <?php 
                                if (empty($_SESSION["AdminFFID"])){
                                   $AdminreadonlyFFID  ="Yes";
                                }else{
                                   $AdminreadonlyFFID  ="No";    
                                }
                            ?>
                            <p><?php echo $AdminBARID;?></p>
                        </div>
                        <div class="Ids-data-btn" style="border-bottom-right-radius:5px;">
                            <button type="submit" name="ANewMember" disabled="<?php echo $AdminreadonlyFFID;?>"  
                                    class="btnresident"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="Ids-remarks">
                    <form method="POST" action="" autocomplete="off">
                    <div class="remarks-input">
                        <textarea class="commentarea" maxlength="200" name="Residentpostremarks" placeholder="Say Something!!!" required></textarea>
                        <button type="submit" name="ARemarksDashboard" class="btnremark"><i class="fa fa-save fa-2x"> SAVE</i></button>
                    </div>
                    </form>
                    <div class="remarks-data">
                    <?php while ($rowrecordremarks=mysqli_fetch_array($dataremark)):?>
                        <?php
                            $timeremarks     =   $rowrecordremarks['DATEremarks'];       $Remarktype         =   $rowrecordremarks['Remarktype'];
                            $remarksBARuser =   $rowrecordremarks['BarIDnum'];           $remarkremarkdata   =   $rowrecordremarks['Remaks']; 
                            $remarkUser     =   $rowrecordremarks['RemarkUser'];         $timeremarks        =   strtoupper($timeremarks); 
                            $timeremarks    =   date("g:i a", strtotime("$timeremarks"));
                            $Dateremark     =   date("M/d/Y", strtotime("$timeremarks"));
                            $Daterecorder   =   "$Dateremark $timeremarks";  
                            if(empty($remarkUser)){
                                $search_remuser	=  "SELECT * FROM `Residents` where `BARID`='$remarksBARuser'"; 
                                $resultuserrem  =   mysqli_query($connect,$search_remuser);
                                while($rowremarktuser=mysqli_fetch_array($resultuserrem))
                                {   
                                    $ResidentremarkBarid          =   $rowremarktuser["BARID"];      $ResidentremarktNname      =   $rowremarktuser["Nickname"];
                                    $ResidentremarkProfile        =   $rowremarktuser["Profile"];    $ResidentremarktCname      =   $rowremarktuser["CompleteName"];
                                }  
                            }else{
                                $search_remuser	        =   "SELECT * FROM users where BarIDnum='$remarkUser'";
                                $resultuserrem  =   mysqli_query($connect,$search_remuser);
                                while($rowremarktuser=mysqli_fetch_array($resultuserrem))
                                {   
                                    $ResidentremarkBarid          =   $rowremarktuser["BarIDnum"];   $ResidentPosition      =   $rowremarktuser["Position"];
                                    $ResidentremarkProfile        =   $rowremarktuser["Profilephoto"];$ResidentNickname      =   $rowremarktuser["NickName"];
                                    $ResidentremarktNname         =   "$ResidentPosition $ResidentNickname"; 
                                } 
                            }
                            if (empty($ResidentremarkBarid)) {
                                $search_remuser	=  "SELECT * FROM `users` where `BarIDnum`='$remarksBARuser'";
                                $resultuserrem  =   mysqli_query($connect,$search_remuser);
                                while($rowremarktuser=mysqli_fetch_array($resultuserrem))
                                {   
                                    $Residentphoto          =   $rowremarktuser["Profilephoto"]; $ResidentPosition         =   $rowremarktuser["Position"]; 
                                    $ResidentNickName         =   $rowremarktuser["NickName"];    
                                }
                                if(empty($Residentphoto)){
                                    $Resprofile             =   "Resources/Images/avatar.png";      $Adminremarkuploader        =   "$ResidentremarktNname";
                                }else{
                                    $Resprofile             =   ("Upload/"."$Residentphoto");       $Adminremarkuploader        =   "$ResidentremarktNname";
                                }
                                $Adminremarkuploader        = "$ResidentPosition $ResidentNickName";
                            }else{
                                $Resprofile             =   ("Upload/"."$ResidentremarkProfile");  $Adminremarkuploader       = "$ResidentremarktNname";
                            }
                        ?>
                        <div class="remarks-content">
                            <div class="content-remark-name">
                                <div class="remark-date" style="width:33%">
                                    <p><?php echo $Dateremark;?></p>
                                </div>
                                <div class="remark-date" style="width:33%">
                                    <p><?php echo $timeremarks;?></p>
                                </div>
                                <div class="remark-date" style="width:33%">
                                    <p><?php echo $Remarktype;?></p>
                                </div>
                            </div>
                            <div class="content-remark-data">
                                <div class="remarks-profile">
                                    <img src="<?php echo $Resprofile;?>">
                                </div>
                                <div class="remarks-data-area">
                                    <div class="data-remarks">
                                        <div class="data-recordremark">
                                            <p style="color:#FC0FC0;font-weight:bold;font-size:1rem;margin-top:5px;"><?php echo $Adminremarkuploader;?></p>
                                            <p style="text-align:justify;margin-left:5px"><?php echo $remarkremarkdata;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="Context-data">
            <div class="dashboard-databox">           
                <div class="dashboard-databoxlegend">
                    <div id="Residentsgenderpercentage" style="width: 100%; height: 200px;margin-top:0px">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChartGender);
                        google.charts.setOnLoadCallback(drawChartCivilStatus);
                        google.charts.setOnLoadCallback(drawChartCitizen);
                        google.charts.setOnLoadCallback(drawChartVoter);
                        google.charts.setOnLoadCallback(drawChartReligion);
                        google.charts.setOnLoadCallback(drawChartStreet);
                        function drawChartGender() {
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $GenderMale     =   ("SELECT * FROM `Residents` where Gender='Male'");          
	                            $GenderFemale   =   ("SELECT * FROM `Residents` where Gender='Female'"); 
                                $Male           =   mysqli_query($connect,$GenderMale);     $Female             =   mysqli_query($connect,$GenderFemale);
                                $TotalMale      =   mysqli_num_rows($Male);                 $TotalFemale        =   mysqli_num_rows($Female);
                            ?>
                            ['Residents', 'Gender Percentage'],
                            ['Male',     <?php echo $TotalMale;?>],
                            ['Female',   <?php echo $TotalFemale;?>],
                            ]);

                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {  0: {offset: 0  , color: '#1e90ff' },
                                       1: {offset: 0.2, color: '#ff69b4'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartgender'));
                            chart.draw(data, options);
                        }
                        function drawChartCivilStatus() {
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $CstatusSingle  =   ("SELECT * FROM `Residents` WHERE `CivilStatus`='Single'"); 
                                $CstatusMarried =   ("SELECT * FROM `Residents` WHERE `CivilStatus`='Married'"); 
                                $CstatusSeparated=  ("SELECT * FROM `Residents` WHERE `CivilStatus`='Separated'"); 
                                $CstatusWidower =   ("SELECT * FROM `Residents` WHERE `CivilStatus`='Widow/er'"); 
                                $Single         =   mysqli_query($connect,$CstatusSingle);      $Married            =   mysqli_query($connect,$CstatusMarried);
                                $Separated      =   mysqli_query($connect,$CstatusSeparated);   $Widow              =   mysqli_query($connect,$CstatusWidower);
                                $TotalSingle    =   mysqli_num_rows($Single);                   $TotalMarried       =   mysqli_num_rows($Married);
                                $TotalSeparated =   mysqli_num_rows($Separated);                $TotalWidow         =   mysqli_num_rows($Widow);
                            ?>
                            ['Residents', 'Gender Percentage'],
                            ['Single',     <?php echo $TotalSingle;?>],
                            ['Married',   <?php echo $TotalMarried;?>],
                            ['Separed',   <?php echo $TotalSeparated;?>],
                            ['Widow',     <?php echo $TotalWidow;?>],
                            ]);

                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {    0: {offset: 0.2, color: '#1e90ff'},
                                         1: {offset: 0  , color: '#ff69b4'},
                                         2: {offset: 0.2, color: '#9932CC'},
                                         3: {offset: 0  , color: '#ff8c00'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartCivistatus'));
                            chart.draw(data, options);
                        }
                        function drawChartCitizen() {
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $CitizenshipFilipino=   ("SELECT * FROM `Residents` WHERE `Citizenship`='Filipino'"); 
                                $CitizenshipNonfil=   ("SELECT * FROM `Residents` WHERE `Citizenship`!='Filipino'"); 
                                $Filipino         =   mysqli_query($connect,$CitizenshipFilipino);  $Nonfilipino      =   mysqli_query($connect,$CitizenshipNonfil);
                                $TotalFilipino    =   mysqli_num_rows($Filipino);                   $TotalNonFilipino =   mysqli_num_rows($Nonfilipino);
                            ?>    
                            ['Residents', 'Gender Percentage'],
                            ['Filipino',     <?php echo $TotalFilipino;?>],
                            ['Non-Fil',   <?php echo $TotalNonFilipino;?>],
                            ]);

                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {    0: {offset: 0.2, color: '#1e90ff'},
                                         1: {offset: 0  , color: '#ff69b4'},
                                         2: {offset: 0  , color: '#9932CC'},
                                         3: {offset: 0.2, color: '#ff8c00'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartCitizenship'));
                            chart.draw(data, options);
                        }
                        function drawChartVoter() {
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $Voter            =   ("SELECT * FROM `Residents` WHERE `VOTER`='Yes'"); 
                                $NonVoter         =   ("SELECT * FROM `Residents` WHERE `VOTER`='No'"); 
                                $Others           =   ("SELECT * FROM `Residents` WHERE `VOTER`='Yes but in other barangay'");
                                $Voter            =   mysqli_query($connect,$Voter);                $NonVoter      =   mysqli_query($connect,$NonVoter);
                                $Others           =   mysqli_query($connect,$Others);               $TotalOthers   =   mysqli_num_rows($Others);
                                $TotalVoter       =   mysqli_num_rows($Voter);                      $TotalNonVoter =   mysqli_num_rows($NonVoter);
                            ?>    
                            ['Residents', 'Gender Percentage'],
                            ['Voter',      <?php echo $TotalVoter;?>],
                            ['Non-Voter',  <?php echo $TotalNonVoter;?>],
                            ['Others',     <?php echo $TotalOthers;?>],
                            ]);

                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {    0: {offset: 0.2, color: '#1e90ff'},
                                         1: {offset: 0  , color: '#ff69b4'},
                                         2: {offset: 0.2, color: '#9932CC'},
                                         3: {offset: 0  , color: '#ff8c00'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartVote'));
                            chart.draw(data, options);
                        }
                        function drawChartReligion() {
                             <?
                                $RomanCatholic    =   ("SELECT * FROM `Residents` WHERE `Religion`='Roman Catholic'"); 
                                $Protestant       =   ("SELECT * FROM `Residents` WHERE `Religion`='Protestant'"); 
                                $Christian        =   ("SELECT * FROM `Residents` WHERE `Religion`='Christian'");
                                $IglesianiCristo  =   ("SELECT * FROM `Residents` WHERE `Religion`='Iglesia ni Cristo'");
                                $Islam            =   ("SELECT * FROM `Residents` WHERE `Religion`='Islam'");
                                $TribalReligions  =   ("SELECT * FROM `Residents` WHERE `Religion`='Tribal Religions'");
                                $Buddhism         =   ("SELECT * FROM `Residents` WHERE `Religion`='Buddhism'");
                                $Hinduism         =   ("SELECT * FROM `Residents` WHERE `Religion`='Hinduism'");
                                $Judaism          =   ("SELECT * FROM `Residents` WHERE `Religion`='Judaism'");
                                $None             =   ("SELECT * FROM `Residents` WHERE `Religion`='None'");
                                $Others           =   ("SELECT * FROM `Residents` WHERE `Religion`='Others'");

                                $RomanCatholic    =  mysqli_query($connect,$RomanCatholic);         $Protestant     =   mysqli_query($connect,$Protestant);
                                $Christian        =   mysqli_query($connect,$Christian);            $IglesianiCristo=   mysqli_query($connect,$IglesianiCristo);
                                $Islam            =   mysqli_query($connect,$Islam);                $TribalReligions=   mysqli_query($connect,$TribalReligions);
                                $Buddhism         =   mysqli_query($connect,$Buddhism);             $Hinduism       =   mysqli_query($connect,$Hinduism);
                                $Judaism          =   mysqli_query($connect,$Judaism);              $None           =   mysqli_query($connect,$None);
                                $Others           =   mysqli_query($connect,$Others);               $TotalOthers    =   mysqli_num_rows($Others); 
                                $TotalRomanCatholic=  mysqli_num_rows($RomanCatholic);              $TotalProtestant=   mysqli_num_rows($Protestant);
                                $TotalChristian   =  mysqli_num_rows($Christian);                   $TotalIglesianiCristo=mysqli_num_rows($IglesianiCristo);
                                $TotalIslam       =  mysqli_num_rows($Islam);                       $TotalTribalReligions=mysqli_num_rows($TribalReligions);
                                $TotalBuddhism    =  mysqli_num_rows($Buddhism);                    $TotalHinduism  =   mysqli_num_rows($Hinduism);
                                $TotalJudaism     =  mysqli_num_rows($Judaism);                     $TotalNone      =   mysqli_num_rows($None);
                            ?>    
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $RomanCatholic    =   ("SELECT * FROM `Residents` WHERE `Religion`='Roman Catholic'"); 
                                $Protestant       =   ("SELECT * FROM `Residents` WHERE `Religion`='Protestant'"); 
                                $Christian        =   ("SELECT * FROM `Residents` WHERE `Religion`='Christian'");
                                $IglesianiCristo  =   ("SELECT * FROM `Residents` WHERE `Religion`='Iglesia ni Cristo'");
                                $Islam            =   ("SELECT * FROM `Residents` WHERE `Religion`='Islam'");
                                $TribalReligions  =   ("SELECT * FROM `Residents` WHERE `Religion`='Tribal Religions'");
                                $Buddhism         =   ("SELECT * FROM `Residents` WHERE `Religion`='Buddhism'");
                                $Hinduism         =   ("SELECT * FROM `Residents` WHERE `Religion`='Hinduism'");
                                $Judaism          =   ("SELECT * FROM `Residents` WHERE `Religion`='Judaism'");
                                $None             =   ("SELECT * FROM `Residents` WHERE `Religion`='None'");
                                $Others           =   ("SELECT * FROM `Residents` WHERE `Religion`='Others'");

                                $RomanCatholic    =  mysqli_query($connect,$RomanCatholic);         $Protestant     =   mysqli_query($connect,$Protestant);
                                $Christian        =   mysqli_query($connect,$Christian);            $IglesianiCristo=   mysqli_query($connect,$IglesianiCristo);
                                $Islam            =   mysqli_query($connect,$Islam);                $TribalReligions=   mysqli_query($connect,$TribalReligions);
                                $Buddhism         =   mysqli_query($connect,$Buddhism);             $Hinduism       =   mysqli_query($connect,$Hinduism);
                                $Judaism          =   mysqli_query($connect,$Judaism);              $None           =   mysqli_query($connect,$None);
                                $Others           =   mysqli_query($connect,$Others);               $TotalOthers    =   mysqli_num_rows($Others); 
                                $TotalRomanCatholic=  mysqli_num_rows($RomanCatholic);              $TotalProtestant=   mysqli_num_rows($Protestant);
                                $TotalChristian   =  mysqli_num_rows($Christian);                   $TotalIglesianiCristo=mysqli_num_rows($IglesianiCristo);
                                $TotalIslam       =  mysqli_num_rows($Islam);                       $TotalTribalReligions=mysqli_num_rows($TribalReligions);
                                $TotalBuddhism    =  mysqli_num_rows($Buddhism);                    $TotalHinduism  =   mysqli_num_rows($Hinduism);
                                $TotalJudaism     =  mysqli_num_rows($Judaism);                     $TotalNone      =   mysqli_num_rows($None);
                            ?>    
                            ['Religion', 'Religion Percentage'],
                            ['Roman Catholic',<?php echo $TotalRomanCatholic;?>],
                            ['Protestant', <?php echo $TotalProtestant;?>],
                            ['Christian',  <?php echo $TotalChristian;?>],
                            ['INC',        <?php echo $TotalIglesianiCristo;?>],
                            ['Islam',      <?php echo $TotalIslam;?>],
                            ['Tribal',     <?php echo $TotalTribalReligions;?>],
                            ['Buddhism',   <?php echo $TotalBuddhism;?>],
                            ['Hinduism',   <?php echo $TotalHinduism;?>],
                            ['Judaism',    <?php echo $TotalJudaism;?>],
                            ['None',       <?php echo $TotalNone;?>],
                            ['Others',     <?php echo $TotalOthers;?>],
                            ]);

                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {    0: {offset: 0.2, color: '#1e90ff'},
                                         1: {offset: 0  , color: '#ff69b4'},
                                         2: {offset: 0.2, color: '#9932CC'},
                                         3: {offset: 0  , color: '#ff8c00'},
                                         4: {offset: 0.2, color: '#1e90ff'},
                                         5: {offset: 0  , color: '#ff69b4'},
                                         6: {offset: 0.2, color: '#9932CC'},
                                         7: {offset: 0  , color: '#ff8c00'},
                                         8: {offset: 0.2, color: '#1e90ff'},
                                         9: {offset: 0  , color: '#ff69b4'},
                                        10: {offset: 0.2, color: '#9932CC'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartReligion'));
                            chart.draw(data, options);
                        }
                        function drawChartStreet() {
                            var data = google.visualization.arrayToDataTable([
                            <?
                                $CabreraStreet          =   ("SELECT * FROM `Residents` WHERE `Street`='Cabrera Street'"); 
                                $CamiaStreet            =   ("SELECT * FROM `Residents` WHERE `Street`='Camia Street'"); 
                                $BenitezStreet          =   ("SELECT * FROM `Residents` WHERE `Street`='Benitez Street'");
                                $DeGuzmanStreet         =   ("SELECT * FROM `Residents` WHERE `Street`='De Guzman Street'");
                                $EpoStreet              =   ("SELECT * FROM `Residents` WHERE `Street`='Epo Street'");
                                $GambanStreet           =   ("SELECT * FROM `Residents` WHERE `Street`='Gamban Street'");
                                $MDelaCruzStreet        =   ("SELECT * FROM `Residents` WHERE `Street`='M. Dela Cruz Street'");
                                $MaClaraStreet          =   ("SELECT * FROM `Residents` WHERE `Street`='Ma. Clara Street'");
                                $ProtacioStreet         =   ("SELECT * FROM `Residents` WHERE `Street`='Protacio Street'");
                                $RectoStreet            =   ("SELECT * FROM `Residents` WHERE `Street`='Recto Street'");
                                $RuizStreet             =   ("SELECT * FROM `Residents` WHERE `Street`='Ruiz Street'");

                                $CabreraStreet    =  mysqli_query($connect,$CabreraStreet);         $MDelaCruzStreet=   mysqli_query($connect,$MDelaCruzStreet);
                                $CamiaStreet      =  mysqli_query($connect,$CamiaStreet);           $MaClaraStreet  =   mysqli_query($connect,$MaClaraStreet);
                                $BenitezStreet    =  mysqli_query($connect,$BenitezStreet);         $ProtacioStreet =   mysqli_query($connect,$ProtacioStreet);
                                $DeGuzmanStreet   =  mysqli_query($connect,$DeGuzmanStreet);        $RectoStreet    =   mysqli_query($connect,$RectoStreet);
                                $EpoStreet        =  mysqli_query($connect,$EpoStreet);             $RuizStreet     =   mysqli_query($connect,$RuizStreet);
                                $GambanStreet     =  mysqli_query($connect,$GambanStreet);          $TotalGambanStreet= mysqli_num_rows($GambanStreet); 
                                $TotalCabreraStreet= mysqli_num_rows($CabreraStreet);               $TotalMDelaCruzStreet=mysqli_num_rows($MDelaCruzStreet);
                                $TotalCamiaStreet =  mysqli_num_rows($CamiaStreet);                 $TotalMaClaraStreet=mysqli_num_rows($MaClaraStreet);
                                $TotalBenitezStreet= mysqli_num_rows($BenitezStreet);               $TotalProtacioStreet=mysqli_num_rows($ProtacioStreet);
                                $TotalDeGuzmanStreet=mysqli_num_rows($DeGuzmanStreet);              $TotalRectoStreet=  mysqli_num_rows($RectoStreet);
                                $TotalEpoStreet   =  mysqli_num_rows($EpoStreet);                   $TotalRuizStreet =  mysqli_num_rows($RuizStreet);
                            ?>    
                            ['Street', 'Street Percentage'],
                            ['Cabrera',     <?php echo $TotalCabreraStreet;?>],
                            ['Camia',       <?php echo $TotalCamiaStreet;?>],
                            ['Benitez',     <?php echo $TotalBenitezStreet;?>],
                            ['De Guzman',   <?php echo $TotalDeGuzmanStreet;?>],
                            ['Epo',         <?php echo $TotalEpoStreet;?>],
                            ['Gamban',      <?php echo $TotalGambanStreet;?>],
                            ['M. DelaCruz', <?php echo $TotalMDelaCruzStreet;?>],
                            ['Ma. Clara',   <?php echo $TotalMaClaraStreet;?>],
                            ['Protacio',    <?php echo $TotalProtacioStreet;?>],
                            ['Recto',       <?php echo $TotalRectoStreet;?>],
                            ['Ruiz',        <?php echo $TotalRuizStreet;?>],
                            ]);
                            var options = {
                            is3D: true,
                            pieSliceText: 'label',
                            slices: {    0: {offset: 0.2, color: '#1e90ff'},
                                         1: {offset: 0  , color: '#ff69b4'},
                                         2: {offset: 0.2, color: '#9932CC'},
                                         3: {offset: 0  , color: '#ff8c00'},
                                         4: {offset: 0.2, color: '#1e90ff'},
                                         5: {offset: 0  , color: '#ff69b4'},
                                         6: {offset: 0.2, color: '#9932CC'},
                                         7: {offset: 0  , color: '#ff8c00'},
                                         8: {offset: 0.2, color: '#1e90ff'},
                                         9: {offset: 0  , color: '#ff69b4'},
                                        10: {offset: 0.2, color: '#9932CC'},
                            },
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechartStreet'));
                            chart.draw(data, options);
                        }
                        </script>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;color:black;font-weight:bold;font-size:20px;"> Gender</p>
                        <div id="piechartgender" style="width: 100%; height: 200px;margin-top:0px;border-bottom:3px solid gray"></div>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;padding-bottom:15px;color:black;font-weight:bold;font-size:20px;"> Citizenship</p>
                        <div id="piechartCitizenship" style="width: 100%; height: 200px;margin-top:0px;border-bottom:3px solid gray"></div>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;color:black;font-weight:bold;font-size:20px;"> Civil Status</p>
                        <div id="piechartCivistatus" style="width: 100%; height: 200px;margin-top:0px;border-bottom:3px solid gray"></div>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;color:black;font-weight:bold;font-size:20px;"> Voters</p>
                        <div id="piechartVote" style="width: 100%; height: 200px;margin-top:0px;border-bottom:3px solid gray"></div>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;color:black;font-weight:bold;font-size:20px;"> Religion</p>
                        <div id="piechartReligion" style="width: 100%; height: 300px;margin-top:0px;border-bottom:3px solid gray"></div>
                        <p style="text-align:center;width:100%;padding:0px;margin:0px;background:#fff;padding-top:15px;color:black;font-weight:bold;font-size:20px;"> Street</p>
                        <div id="piechartStreet" style="width: 100%; height: 300px;margin-top:0px;border-bottom:3px solid gray"></div>
                    </div>
                </div>
                <div class="dashboard-databoxcontent">
                    <?php while ($rowremarks=mysqli_fetch_array($result)):?>
                        <?php
                            $ResidentHHID       =   $rowremarks['HHID'];            $ResidentFFID       =   $rowremarks['FFID'];
                            $ResidentBARID      =   $rowremarks['BARID'];           $ResidentProfile    =   $rowremarks['Profile'];
                            $ResidentLastName   =   $rowremarks['LastName'];        $ResidentMiddleName =   $rowremarks['MiddleName'];
                            $ResidentFirstName  =   $rowremarks['FirstName'];       $ResidentSuffix     =   $rowremarks['Suffix'];
                            $daterecord         =   $rowremarks['BirthDate'];       $ResidentFamrole    =   $rowremarks['FFIDtype'];
                            $BirthDate          =   $daterecord;                    $currmo             =   (date("m")*30.41);
                            $currd              =   date("d");                      $Curry              =   (date("Y")*365);
                            $totalcurdays       =   ("$Curry"+"$currmo"+"$currd");  $BirthDate          =   explode("-", $BirthDate);
                            $Birthyear          =   ("$BirthDate[0]" *365);         $Birthmo            =   ("$BirthDate[1]" *30.41);
                            $Birthda            =   $BirthDate[2];                  $totalbdays         =   ("$Birthyear"+"$Birthmo"+"$Birthda");
                            $age                =   ("$totalcurdays"-"$totalbdays");$age                =   ("$age"/365);
                            $Age                =   (int)$age;                      $ResidentAge        =   ("$Age"." "."years old.");
                            $RM                 =   explode(" ",$daterecord);       $Dateremarks        =   ("$RM[0]");                     
                            $Timeremarks        =   ("$RM[1]");                     $RRY                =   ("$Dateremarks[0]");            
                            $RRM                =   ("$Dateremarks[1]");            $RRD                =   ("$Dateremarks[2]"); 
                            $timeremarks        =   date("g:i a", strtotime("$Timeremarks"));$ResidentStat= $rowremarks['Residentstatus']; 
                            $Dateremark         =   date("M/d/Y", strtotime("$Dateremarks"));
                            $Daterecorder       =   "$Dateremark $timeremarks";                   

                            if (empty($ResidentProfile)) {
                                $Resprofile="Resources/Images/avatar.png";
                            }else{
                                $Resprofile=("Upload/"."$ResidentProfile");
                            }
                        ?>
                        <div class="remarks-content" style="width:90%;margin:2px 5%;">
                            <div class="content-remark-name">
                                <div class="remark-date" style="width:20%;background:#fff;border-right:1px solid gray">
                                    <p style="padding:1px 0px;text-align:center"><?php echo $Dateremark;?></p>
                                </div>
                                <div class="remarktype" style="width:80%">
                                    <div class="content-remark-name" style="width:100%;border-bottom:5px solid gray;">
                                        <div class="remark-date" style="width:30%;border-right:1px solid gray">
                                            <p style="padding:1px 0px;text-align:center"><?php echo $ResidentAge;?></p>
                                        </div>
                                        <div class="remarktype" style="width:70%">
                                            <div class="content-remark-name" style="width:100%;border-bottom:5px solid gray;">
                                                <div class="remark-date" style="width:30%;border-right:1px solid gray">
                                                    <p style="padding:1px 0px;text-align:center"><?php echo $ResidentStat;?></p>
                                                </div>
                                                <div class="remarktype" style="width:70%">
                                                    <div class="content-remark-name" style="width:100%;border-bottom:5px solid gray;">
                                                        <div class="remark-date" style="width:33%;border-right:1px solid gray">
                                                          <p style="padding:1px 0px;text-align:center"><?php echo $ResidentFamrole;?></p>
                                                        </div>
                                                        <div class="remark-date" style="width:33%;border-right:1px solid gray">
                                                            <a href="AdminViewrecord?id=<?php echo $ResidentBARID;?>"title="View Record" style="color:white" class='btnremark'> 
                                                                <p style="padding:5px 0px;text-align:center"><i class="fa fa-pencil-square-o fa-lg"></i></p>
                                                            </a>
                                                        </div>
                                                        <div class="remarktype" style="width:33%">
                                                            <a href="AdminDeleterecord?id=<?php echo $ResidentBARID;?>" title="Delete Record" style="color:white" class='btnremark'> 
                                                                <p style="padding:5px 0px;text-align:center"><i class="fa fa-trash-o fa-lg"></i></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-remark-data" style="background:transparent">
                                <div class="remarks-profile">
                                    <img src="<?php echo $Resprofile;?>">
                                </div>
                                <div class="remarks-data-area" style="background:transparent">
    <! -----Household ID -------------------------------------------------------------------  -->                            
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>Household ID</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentHHID;?></p>
                                        </div>
                                    </div>                            
    <! -----Family ID -------------------------------------------------------------------  -->                            
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>Family ID</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentFFID;?></p>
                                        </div>
                                    </div>                            
    <! -----Barangay ID -------------------------------------------------------------------  -->                            
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>Barangay ID</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentBARID;?></p>
                                        </div>
                                    </div>
    <! -----Last Name -------------------------------------------------------------------  -->                                    
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>Last Name</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentLastName;?></p>
                                        </div>
                                    </div>
    <! -----First Name -------------------------------------------------------------------  -->                                    
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>First Name</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentFirstName;?></p>
                                        </div>
                                    </div>
    <! -----Middle Name -------------------------------------------------------------------  -->                                    
                                    <div class="content-remark-name" style="width:100%">
                                        <div class="remark-date" style="width:30%">
                                            <p>Middle Name</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentMiddleName;?></p>
                                        </div>
                                    </div>
    <! ----- Suffix Name -------------------------------------------------------------------  -->                                    
                                    <div class="content-remark-name" style="width:100%;border-bottom:5px solid gray;">
                                        <div class="remark-date" style="width:30%">
                                            <p>Suffix</p>
                                        </div>
                                        <div class="remarktype" style="width:70%;background:#fff">
                                            <p style="text-align:left"><?php echo $ResidentSuffix;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
    <div class="BG-Footer">
</div>
</body>
</html>


