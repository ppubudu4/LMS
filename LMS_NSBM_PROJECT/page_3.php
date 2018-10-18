<?php 
require_once 'core/init.php';

include 'core/setLech.php';


if(!(isset($_SESSION['id']))){
	header('location:index.php');
}
//////////////////////////////////////////////

if(isset($_POST['upload'])){

	
	if(empty($_FILES["fileUPload"]["name"])){ // check file is empty
		$UserUploadError = "Plese select a file";
	}else if(($_POST['fileName']==null || $_POST['fileName']=="")){ // check filename is empty
		$UserUploadError = "Plese enter the file name";
	}else if($_POST['lechNo']==null||$_POST['lechNo']==""){	// check letch name is empty
		$UserUploadError = "Plese enter the lecture no";
	}else{
		$fileName = $_POST['fileName'];
		$lechNo = $_POST['lechNo'];
	
		$target_dir = "uploaded_files/".getFacName()."/".getYearName()."/".getCourseName()."/".$fileName."_"; //set file uploadeing path
		$target_file = $target_dir . basename($_FILES["fileUPload"]["name"]);
		$target_type = $_FILES["fileUPload"]["type"]; //set file type
		
		if (file_exists($target_file)) {
    		$UserUploadError =  "Sorry, file already exists.";
		}else{
			if(move_uploaded_file($_FILES["fileUPload"]["tmp_name"], $target_file)){ // move uploading file 
			
				global $connect;
			
				$uploadQuery = $connect->query("INSERT INTO lecturefiles ( FileName , FilePath , FileType , LechID , CourseID , YearID , FacID) VALUES ('$fileName' , '$target_file' , '$target_type' , '$lechNo' , '".$_SESSION['COURSE']."' , '".$_SESSION['YEAR']."' , '".$_SESSION['FAC']."')"); 
				//die("error : ".mysqli_error($connect));
				if(mysqli_affected_rows($connect)){
					$success = $fileName." has been uploaded";
				}
			}
		}
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>NSBM | LMS</title>

<link rel="icon" href="Imgs/LSM_logo_tr.png" type="image/gif" sizes="300x300">
<link href="fonts/fonts.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/SSudheers_Style_2.css" type="text/css">
<link rel="stylesheet" href="css/navbar.css" type="text/css">
<link rel="stylesheet" href="css/footer.css" type="text/css">
</head>
<body style="background-color:rgba(0,0,0,1.00)" onload="height1set()" >
<div class="back2" style="height:auto">
<!-- nav bar -->
<nav id="nav" class="nav">
	<div class="navBrand">
    	<a href="index.php"><img src="Imgs/LSM_logo_tr.png" class="imgRes" alt="LMS"></a>
    </div>
    <div class="navItem_left">
    	<ul class="item">
        	<li><a href="index.php">Home</a></li>
            <li><a href="http://nsbm.lk/">NSBM</a></li>
            <li><a href="http://nsbm.lk/nsbm/nsbm-faculty#">ABOUT US</a></li>
            <li><a href="page_1.php">YEARS</a></li>
        </ul>
    </div>
    <div class="navItem_right">
    	<ul class="navDropDown">
            <li>
            	<a><span class="icon icon-user"></span> Account <span class="icon icon-menu-down"></span></a>
            	<ul class="navDropDownItem">
                	<li><a href="user_profile.php"><span><?php if(isset($_SESSION['id'])){ $userdata = getUserDataByUserId($_SESSION['id']); echo $userdata['username'];} ?></span></a></li>
                    <li><a href="Page_1.php"><span class="icon icon-book"></span> My Course</a></li>
                    <li><a href="logout.php"><span class="icon icon-log-out"></span> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navMobResBtnCont">
    	<div class="navMobResBtn">
        	<span id="navMobResShow" class="icon icon-menu-hamburger"></span>
            <span id="navMobResHide" class="icon icon-remove"></span>
        </div>
    </div>
</nav>

<div style="height:50px"></div>

<div class="row" id="r">

	<div class="col_1" id="h_1">
    	<div style="width:auto;height:auto;background-color:rgba(255,255,255,0);padding:5px">
        	<div style="background-color:rgba(255,255,255,0.9);height:auto;border-radius:5px;padding:5px;box-shadow:0px 0px 10px rgba(0,0,0,1.00)">
            	<p style="margin:0px;font-family:'Square721_BT';color:rgba(0,0,0,1.00);font-weight:bolder;text-align:center;font-size:24px"><?php echo getFacName(); ?></p>
                <p style="background-color:rgba(25,88,157,0.9);margin:0px;font-family:'Square721_BT';color:rgba(0,0,0,1.00);font-weight:100;text-align:center;font-size:18px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;color:rgba(255,255,255,1.00)"><?php echo getYearName(); ?></p>
            </div>
            <div style="height:auto;width:auto;margin-top:5px;background-color:rgba(255,255,255,0.9);padding:5px;border-radius:5px">
            	<p style="margin:0px;font-family:'Square721_BT';color:rgba(0,0,0,1.00);font-weight:bolder;text-align:center;font-size:16px"><?php echo getCourseName(); ?></p>
            </div>
            <div class="detailHead1" onClick="slideTog(1)">
            	<p>Details<span id="sUP1" style="float:right;padding-bottom:6px;padding-right:10px">+</span><span id="SDown1" style="float:right;margin:0px;margin-top:-2px;padding-right:10px">&ndash;</span></p>
            </div>
            <div class="detailsCont1">
            	<br><br><br>
                	<h5 style="text-align:center"> more details</h5>
                <br><br><br>
            </div>
            <div class="detailHead2" onClick="slideTog(2)">
            	<p>Details<span id="sUP2" style="float:right;padding-bottom:6px;padding-right:10px">+</span><span id="SDown2" style="float:right;margin:0px;margin-top:-2px;padding-right:10px">&ndash;</span></p>
            </div>
            <div class="detailsCont2">
            	<br><br><br>
                	<h5 style="text-align:center"> more details</h5>
                <br><br><br>
            </div>
        </div>
    </div>
    
    
    <div class="col_2" id="h_2">
    	<div class="lessonCont">
        <!-- set lesson conainers -->
        	<?php 
			$Lecth = setLectureCont();
			if($Lecth!=null){
				$i=0;$z=0;$l=0;
				foreach($Lecth as $c){ ?>
            		<div class="lessons" style="padding-top:7px;padding-left:5px;cursor:default;padding-bottom:15px">
            			<p style="margin:0px"><?php echo "Lecture ".$Lecth[$i++][0][0]; ?></p>
                        <h5 style="margin:0px;text-decoration:underline;margin-bottom:10px"><?php echo $Lecth[$z++][1][0];?></h5> 
                        
                        <ul style="list-style:none">
                        <?php 
						$queryFiles = $connect->query("SELECT * FROM lecturefiles WHERE (LechID = ".$Lecth[$l++][0][0]." AND CourseID = ".$_SESSION['COURSE'].") AND ( YearID = ".$_SESSION['YEAR']." AND FacID = ".$_SESSION['FAC'].")");
						
						if(mysqli_num_rows($queryFiles)){
							while($row = $queryFiles->fetch_assoc()){?>
								
								<li style="padding:3px"><a href="<?php echo $row['FilePath'] ?>" id="file"><span class="icon icon-download-alt"></span>&nbsp;<?php echo $row['FileName'] ?></a></li>
								
						<?php		
							}
						}
						?>
                        	
                        </ul>
                        
                        
                    </div>
			<?php	
				}
			}
			?>
        </div>
    </div>
    <div class="col_1" id="h_3">
    	<div style="padding:5px;">
        	<div style="background-color:rgba(255,255,255,0.8);border-radius:5px;min-height:600px;box-shadow:0px 0px 10px rgba(0,0,0,1.00)">
            	<?php if(isset($_SESSION['AccL'])){ 
						if($_SESSION['AccL']=='student'){
						}else if(($_SESSION['AccL']=='teacher') || ($_SESSION['AccL']=='admin')){ /// only teachers can upload files
				?>
                <div style="background-color:;width:auto;text-align:center">
                	<h4 style="text-align:center;margin:0px;padding:5px;margin-bottom:10px">File Upload</h4>
                	<form method="post" enctype="multipart/form-data">
                    	<table style="margin:auto">
                        	<tr>
                            	<td ><p style="margin:0px;"><input type="file"  name="fileUPload" style="cursor:pointer;width:auto;width:180px;"></p></td>
                             </tr>
                             <tr>
                             	<td><p style="margin:0px;"><input type="text" style="border-style:solid;border-color:rgba(49,72,160,1.00)" class="fileupinput" placeholder="File Name" name="fileName" style="width:180px;margin:0px"><p></td>
                             </tr>
                             <tr>
                             	<td><p style="margin:0px;margin-top:-5px"><input style="border-style:solid;border-color:rgba(49,72,160,1.00)" class="fileupinput" type="text" placeholder="Lecture Number" name="lechNo" style="width:180px;margin:0px"></p></td>
                             </tr>
                             <tr>
                             	<td><p style="margin:0px;"><input id="fileupload" type="submit" name="upload" value="Upload File"></p></td>
                             </tr>
                             <?php
							 	if(isset($UserUploadError)){
							 ?>
                             <tr>
                             	<td><p style="margin:0px;font-size:14px;border:1px;border-style:solid;border-radius:5px;border-color:rgba(181,60,62,1.00);color:rgba(181,60,62,1.00)"><?php  echo $UserUploadError;?></p></td>
                             </tr>
                             <?php
                             	}else if(isset($success)){ 
							 ?>
                             <tr>
                             	<td><p style="padding:3px;font-size:14px;margin:0px;border:1px;border-style:solid;border-color:rgba(38,170,61,1.00);color:rgba(38,170,61,1.00);border-radius:5px"><?php  echo $success;?></p></td>
                             </tr>
                             <?php }
							 ?>
                         </table>
                     </form>
                 </div>
                <?php
					   }
						}
				?>
            </div>
        </div>
    </div>

</div>

<div style="width:100%;height:auto">
<footer class="footer-main" style="min-height:220px;">
	<div class="footer-left">
    	<div class="footer-left-cont">
        	<img src="imgs/Icons/logo_ico.png" alt="NSBM" style="width:200px">
			<p class="footer-links">
				<a href="index.php">Home</a>
				.
				<a href="#">About</a>
				·
				<a href="#">Contact</a>
			</p>
			<p class="footer-name">Copyright &copy; National School of Business Management 2017</p>
        </div>
    </div>
	<div class="footer-center" >
		<div class="footer-center-cont">
        <div>
			<img src="imgs/Icons/locationW.png">
			<p><span>No 309, High Level Road</span> Colombo 05, Sri Lanka.</p>
		</div>
        <br>    
		<div>
			<img src="imgs/Icons/phoneW.png">
			<p>+94(11) 567 2545</p>
		</div>
        <br>
		<div>
			<img src="imgs/Icons/mailW.png">
 			<p><a href="info@nsbm.lk">info@nsbm.lk</a></p>
		</div>
        </div>
	</div>
	<div class="footer-right">
		<div class="footer-right-cont">
        	<p class="footer-about">
				<span>About NSBM</span><br>
				From exemplary teaching to a campus experience packed with cultural and social opportunities, NSBM is the best place to learn and get your future off to a flying start...
			</p>
			<div class="footer-icons">
				<a href="https://www.facebook.com/nsbm.lk"><img src="imgs/Icons/Facebook.png"></a>
				<a href="https://www.linkedin.com/company/nsbm-green-university-town"><img src="imgs/Icons/LinkedIn.png"></a>
				<a href="https://www.youtube.com/channel/UCHsodhRyiuri2jD7H7nfsRg"><img src="imgs/Icons/Youtube.png"></a>
				<a href="https://twitter.com/NSBM_SriLanka"><img src="imgs/Icons/Twitter.png"></a>
			</div>
        </div>
	</div>
</footer>
</div>


</div>
<!-- jQuery -->
<script src="js/jQuery_v3.2.1.js"></script>
<script>

function height1set(){
	setTimeout(height1set,50);
	if(document.getElementById('nav').clientWidth>1100){
		if(document.getElementById('h_3').clientHeight>document.getElementById('h_1').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_3').clientHeight + "px";
		}else if(document.getElementById('h_3').clientHeight>document.getElementById('h_2').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_3').clientHeight + "px";
		}else if(document.getElementById('h_2').clientHeight>document.getElementById('h_3').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_2').clientHeight + "px";
		}else if(document.getElementById('h_2').clientHeight>document.getElementById('h_1').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_2').clientHeight + "px";
		}else if(document.getElementById('h_1').clientHeight>document.getElementById('h_2').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_1').clientHeight + "px";
		}else if(document.getElementById('h_1').clientHeight>document.getElementById('h_3').clientHeight){
			document.getElementById('r').style.height = document.getElementById('h_1').clientHeight + "px";
		}else{
			//alert(document.getElementById('h_1').clientHeight + document.getElementById('h_2').clientHeight + document.getElementById('h_3').clientHeight + "px");
			document.getElementById('r').style.height = document.getElementById('h_1').clientHeight +document.getElementById('h_2').clientHeight + document.getElementById('h_3').clientHeight + "px";
		}
	}
}
</script>
<script>
$(document).ready(function() {
    $('.back2').fadeIn(300);
});

var s1 = 0;
var s2 = 0;

$('.detailHead1').click( // when h=detail head clicking
	function(){
		$('.detailsCont1').slideToggle(300);
		if(s1==0){
			$('#SDown1').fadeOut(300 , 
				function(){
					$('#sUP1').fadeIn(100);
				});
			s1=1;
		}else if(s1==1){
			$('#sUP1').fadeOut(50 , 
				function(){
					$('#SDown1').fadeIn(300);
				});
			s1=0;
		}
});

$('.detailHead2').click(
	function(){
		$('.detailsCont2').slideToggle(300);
		if(s2==0){
			$('#SDown2').fadeOut(300 , 
				function(){
					$('#sUP2').fadeIn(100);
				});
			s2=1;
		}else if(s2==1){
			$('#sUP2').fadeOut(50 , 
				function(){
					$('#SDown2').fadeIn(300);
				});
			s2=0;
		}
});

$('.navDropDown>li').hover( // nav bar list hover
	function(){
		$('.navDropDownItem').slideDown(300);
	} , 
	function(){
		$('.navDropDownItem').slideUp(300);
	});
var resbtnspan = 0;
$('.navMobResBtn').click( // nav moile res ponsive button work
	function(e){
		$('.navItem_left,.navItem_right').slideToggle(300);
		e.stopPropagation();
		if(resbtnspan==0){
			$('#navMobResShow').fadeOut(100 , 
				function(){
					$('#navMobResHide').fadeIn(100);
				});
			resbtnspan=1;
		}else if(resbtnspan==1){
			$('#navMobResHide').fadeOut(100 , 
				function(){
					$('#navMobResShow').fadeIn(100);
				});
			resbtnspan=0;		
		}
	});
$('html:not(.nav)').click(
	function(){
		$('.navItem_left,.navItem_right').slideUp(300);
		$('#navMobResHide').fadeOut(100 , 
			function(){
				$('#navMobResShow').fadeIn(100);
			});
	});

</script>
</body>
</html>
