<?php 
require_once 'core/init.php';
include 'core/setcourse.php';
include 'core/setLech.php';

if(!(isset($_SESSION['id']))){
	header('location:index.php');
}

if(isset($_POST['C1'])){
	setLecth(1);
}else if(isset($_POST['C2'])){
	setLecth(2);
}else if(isset($_POST['C3'])){
	setLecth(3);
}else if(isset($_POST['C4'])){
	setLecth(4);
}else if(isset($_POST['C5'])){
	setLecth(5);
}else if(isset($_POST['C6'])){
	setLecth(6);
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
<link rel="stylesheet" href="css/SSudheers_Style.css" type="text/css">
<link rel="stylesheet" href="css/SSudheers_Style_2.css" type="text/css">
<link rel="stylesheet" href="css/navbar.css" type="text/css">
<link rel="stylesheet" href="css/footer.css" type="text/css">
</head>

<body style="background-color:rgba(0,0,0,1.00)">

<div class="back">
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

<div class="row" style="padding-top:70px" id="r">
	<div class="col_1" id="h_1">
    	<div style="width:auto;height:auto;background-color:rgba(255,255,255,0);padding:5px">
        	<div style="background-color:rgba(255,255,255,0.9);height:auto;border-radius:5px;padding:5px;box-shadow:0px 0px 10px rgba(0,0,0,1.00)">
            	<p style="margin:0px;font-family:'Square721_BT';color:rgba(0,0,0,1.00);font-weight:bolder;text-align:center;font-size:24px"><?php echo getFacName(); ?></p>
                <p style="background-color:rgba(25,88,157,0.9);margin:0px;font-family:'Square721_BT';color:rgba(0,0,0,1.00);font-weight:100;text-align:center;font-size:18px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;color:rgba(255,255,255,1.00)"><?php echo getYearName(); ?></p>
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
    
    <form method="post">
    <div class="col_2" id="h_2">
    	<div class="lessonCont">
        <?php 
			$courses = setCourse($_SESSION['YEAR'],$_SESSION['FAC']);
			if($courses!=null){
			$i=0;$z=0;$l=1;
			foreach($courses as $c){ //set content
		?>
            	<a href="">
            		<div class="lessons">
            			<p><button type="submit" name="<?php echo "C".$l; $l++; ?>"><?php echo $courses[$i++][0][0]." - ".$courses[$z++][1][0]; ?></button></p>
            		</div>
           	 	</a>	
		<?php	
			}
			}
		?>
        </div>
    </div>
    </form>
    <div class="col_1" id="h_3">
    	<div style="padding:5px;">
        	<div style="background-color:rgba(255,255,255,0.8);border-radius:5px;min-height:600px;box-shadow:0px 0px 10px rgba(0,0,0,1.00)">
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
$(document).ready(function() {// page contene fade in
    $('.back').fadeIn(300);
});
var s1 = 0;
var s2 = 0;
$('.detailHead1').click(// detail head 1 click function
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

$('.detailHead2').click(// detail head 2 click function
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

$('.navDropDown>li').hover( // nav dropdown hover function
	function(){
		$('.navDropDownItem').slideDown(300);
	} , 
	function(){
		$('.navDropDownItem').slideUp(300);
	});
var resbtnspan = 0;
$('.navMobResBtn').click(// nav mob. res. button function
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
$('html:not(.nav)').click(// HTML click functoin
	function(){
		$('.navItem_left,.navItem_right').slideUp(300);
		$('#navMobResHide').fadeOut(100 , 
			function(){
				$('#navMobResShow').fadeIn(100);
			});
	});
setInterval(heightset,50);
function heightset(){
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
		}
	}else{
		document.getElementById('r').style.height = document.getElementById('h_1').clientHeight +document.getElementById('h_2').clientHeight + document.getElementById('h_3').clientHeight + "px";
	}
}
</script>
</body>
</html>
