<?php  

require_once 'core/init.php';
include 'core/setYear-Fac.php';

if(!(isset($_SESSION['id']))){
	header('location:index_1.php');
}  

if(isset($_POST['F1_Y1'])){
	gotocourse(1 , 1);
}else if(isset($_POST['F1_Y2'])){
	gotocourse(1 , 2);
}else if(isset($_POST['F1_Y3'])){
	gotocourse(1 , 3);
}else if(isset($_POST['F1_Y4'])){
	gotocourse(1 , 4);
}else if(isset($_POST['F1_Y5'])){
	gotocourse(1 , 5);
}else if(isset($_POST['F1_Y6'])){
	gotocourse(1 , 6);
}else if(isset($_POST['F1_Y7'])){
	gotocourse(1 , 7);
}else if(isset($_POST['F2_Y1'])){
	gotocourse(2 , 1);
}else if(isset($_POST['F2_Y2'])){
	gotocourse(2 , 2);
}else if(isset($_POST['F2_Y3'])){
	gotocourse(2 , 3);
}else if(isset($_POST['F2_Y4'])){
	gotocourse(2 , 4);
}else if(isset($_POST['F2_Y5'])){
	gotocourse(2 , 5);
}else if(isset($_POST['F2_Y6'])){
	gotocourse(2 , 6);
}else if(isset($_POST['F2_Y7'])){
	gotocourse(2 , 7);
}else if(isset($_POST['F3_Y1'])){
	gotocourse(3 , 1);
}else if(isset($_POST['F3_Y2'])){
	gotocourse(3 , 2);
}else if(isset($_POST['F3_Y3'])){
	gotocourse(3 , 3);
}else if(isset($_POST['F3_Y4'])){
	gotocourse(3 , 4);
}else if(isset($_POST['F3_Y5'])){
	gotocourse(3 , 5);
}else if(isset($_POST['F3_Y6'])){
	gotocourse(3 , 6);
}else if(isset($_POST['F3_Y7'])){
	gotocourse(3 , 7);
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
<link rel="stylesheet" href="css/SSudheers_Style_3.css" type="text/css">
<link rel="stylesheet" href="css/navbar.css" type="text/css">
<link rel="stylesheet" href="css/footer.css" type="text/css">
</head>
<body style="background-color:rgba(0,0,0,1.00)">
<div class="back">

<nav class="nav" id="nav">
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

<form method="post">
<div class="container" style="background-color:transparent;min-height:182px;padding-bottom:100px;padding-top:200px">
	<div style="width:60%;margin:auto;background-color:transparent;height:auto">
    	<div class="fac">
        	<div id="comp" class="facHeading">
        		<p>SCHOOL OF COMPUTING</p>
            </div>
            <div id="compY" class="years">
            	<div>
                    <a onClick="gotoCourse(1 , 1)">
                        <div>
                            <h4><button type="submit" name="F1_Y1">Year 0</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y2">Year 1</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y3">Year 2</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y4">Year 3</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y5">Year 4</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y6">PGD</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F1_Y7">Other</button></h4>
                        </div>
                     </a>
                 </div>
            </div>
        </div>
    	<div class="fac">
        	<div id="bus" class="facHeading">
        		<p>SCHOOL OF BUSINESS</p>
            </div>
            <div id="busY" class="years">
            	<div>
                    <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y1">Year 0</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y2">Year 1</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y3">Year 2</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y4">Year 3</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y5">Year 4</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y6">PGD</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F2_Y7">Other</button></h4>
                        </div>
                     </a>
                 </div>
            </div>
        </div>
    	<div class="fac">
        	<div id="eng" class="facHeading">
        		<p>SCHOOL OF ENGINEERING</p>
            </div>
            <div id="engY" class="years">
            	<div>
                    <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y1">Year 0</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y2">Year 1</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y3">Year 2</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y4">Year 3</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y5">Year 4</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y6">PGD</button></h4>
                        </div>
                     </a>
                     <a href="">
                        <div>
                            <h4><button type="submit" name="F3_Y7">Other</button></h4>
                        </div>
                     </a>
                 </div>
            </div>
        </div>
    </div>
</div>
</form>

<div style="width:100%;height:auto;">
<footer class="footer-main" style="min-height:220px;">
	<div class="footer-left">
    	<div class="footer-left-cont">
        	<img src="imgs/Icons/logo_ico.png" alt="NSBM" style="width:200px">
			<p class="footer-links">
				<a href="#index.php">Home</a>
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
				<span>About NSBM</span>
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
<script src="js/jQuery_v1.11.2.js"></script>
<script>
$('.back').fadeIn(300);
$('#comp').click(
	function(){
		$('#compY').slideToggle(300);
		$('#busY,#engY').slideUp(300);
	});
$('#bus').click(
	function(){
		$('#busY').slideToggle(300);
		$('#compY,#engY').slideUp(300);
	});
$('#eng').click(
	function(){
		$('#engY').slideToggle(300);
		$('#compY,#busY').slideUp(300);
	});
$('.navDropDown>li').hover(
	function(){
		$('.navDropDownItem').slideDown(300);
	} , 
	function(){
		$('.navDropDownItem').slideUp(300);
	});
var resbtnspan = 0;
$('.navMobResBtn').click(
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
		if(document.getElementById('nav').clientWidth<=480){
		$('.navItem_left,.navItem_right').slideUp(300);
		$('#navMobResHide').fadeOut(100 , 
			function(){
				$('#navMobResShow').fadeIn(100);
			});
	}
	});
</script>
</body>
</html>