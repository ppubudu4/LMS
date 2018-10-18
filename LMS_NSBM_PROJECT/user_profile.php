<?php 
require_once 'core/init.php';

if(!(isset($_SESSION['id']))){
	header('location:index.php');
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
<body>
<div class="back">
<!-- nav bar -->
<nav class="nav">
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

<div style="width:100%;min-height:500px;padding-top:70px;margin-bottom:20px">

	<div style="background-color:rgba(0,0,0,0.8);padding-top:15px;max-width:600px;height:600px;margin:auto;border-radius:10px;text-align:center;font-family:'Square721_BT'">
		<h3 style="margin:0px;color:rgba(252,252,252,1.00)">Personal Details</h3>
        <form method="post">
    		<table class="tableUpdateProfile">
            	<tr>
                	<td colspan="2"><p><input type="text" name="firstName" placeholder="First Name"></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p><input type="text" name="lastName" placeholder="Last Name"></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p><input type="text" name="userName" placeholder="User Name"></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p><input type="text" name="address_1" placeholder="Address 1"></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p><input type="text" name="address_2" placeholder="Address 2"></p></td>
                </tr>
                <tr>
                	<td colspan="2"><p><input type="text" name="contactNo" placeholder="Contact No"></p></td>
                </tr>
                <tr>
                	<td style="padding-left:14.5%"><p style="text-align:left"><input id="updateProfilepaswd" type="password" name="updateProfilePassword" placeholder="Password"></p></td>
                    <td style="padding-right:15%"><p style="text-align:right;"><input id="updateProfileButton" type="submit" name="updateProfile" value="Update Profile"></p></td>
                </tr>
            </table>
    	</form>
        <h3 style="margin:0px;color:rgba(252,252,252,1.00);margin-top:10px">Update Password</h3>
        <form method="post">
    		<table class="tableUpdateProfile">
            	<tr>
                	<td><p><input type="password" name="newPassword" placeholder="New Password" autocomplete="off"></p></td>
                </tr>
                <tr>
                	<td><p><input type="password" name="ConfirmNewPassword" placeholder="Confirm Password" autocomplete="off"></p></td>
                </tr>
                <tr>
                	<td><p><input type="password" name="oldPassword" placeholder="Old Password" autocomplete="off"></p></td>
                </tr>
                <tr>
                    <td><p style="text-align:center;"><input id="updatepaswdBtn" type="submit" name="updatePasswd" value="Update Password"></p></td>
                </tr>
            </table>
    	</form>
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
<script>
$(document).ready(function(e) {
    $('.back').fadeIn(300);
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
		$('.navItem_left,.navItem_right').slideUp(300);
		$('#navMobResHide').fadeOut(100 , 
			function(){
				$('#navMobResShow').fadeIn(100);
			});
	});
</script>

</body>
</html>