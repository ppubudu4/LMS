<?php
require_once 'core/init.php';
// form submiited
if($_POST) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($username == "" || $username == null) { 		// check user name field not empty
		$userError = " * Username Field is Required ";
	}else if($password == "" || $password == null) {		// check passwd field not empty
		$userError = " * Password Field is Required ";
	}else if((!($username == "" || $username == null)) && (!($password == "" || $password == null))) {		//username field & passwd field not empty
		if(userExists($username) == TRUE) {		// check user name is registered
			$login = login($username, $password);		
			if($login) {		//check  user name & passwd are matched
				$userdata = userdata($username);

				$_SESSION['id'] = $userdata['id'];		// create session from user id
				$_SESSION['AccL'] = $userdata['AccLevel'];		//create session user's access level
				//exit();
			}else{
				$userError = " * Incorrect username/password combination";
			}
		}else{
			$userError = " * Username does not exists";
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
<link rel="stylesheet" href="css/SSudheers_Style.css" type="text/css">
</head>

<body style="background-color:rgba(0,0,0,1.00)">
<div class="back">

<!-- first loading cont -->
<div id="first_load">
	<div style="margin:auto;max-width:320px;background-color:transparent;padding:0px">
		<div id="first_load_logo_cont">
			<img src="Imgs/LSM_logo_tr.png" alt="" id="firstLoadLMSLogo" style="transition:0.5s;border-radius:10px;max-width:100%;display:block;height:auto;margin:0px;">
		</div>
    </div>
    <div style="margin:auto;max-width:500px;">
		<div id="first_load_heading">
    		<h1 style="text-align:center;color:rgba(255,255,255,1.00);font-family:'Square721_BT';text-shadow:5px 5px 5px rgba(0,0,0,1.00)">Learning Management System</h1>
    		<div style="width:250px;height:30px;background-color:transparent;margin:auto;padding-top:20px" id="prog_bar">
    			<div style="height:10px;width:200px;margin:auto;background-color:transparent;padding:0px">
        			<div style="" id="firstLoadProgBarIn"></div>
        		</div>
    		</div>
        </div>
    </div>
</div>

<!-- page content -->
<div id="pageContent">

<!-- nav bar -->
<nav id="nav" class="nav">
<!-- nav bar brand -->
	<div id="nav-brand-mob">
        <a href="index.html"><img src="Imgs/logo_ico_with_shadow.png" style="max-width:100px" alt="NSBM Logo" ></a>
    </div>
    <!-- nav list -->
    <div id="navList">
    	<ul>
        	<li onClick="NewsContShow('NewsFeeds')"><h2>News Feeds</h2></li>
            <li onClick="NewsContShow('CandS')"><h2>Club & Societies</h2></li>
            <li onClick="NewsContShow('Other')"><h2>Other</h2></li>
            <!-- nav dropdown only display for small divices -->
            <li id="navAccDropDown">
            	<h2><span class="icon icon-user" style="font-size:20px"></span> Account <span class="icon icon-menu-down" style="font-size:18px"></span></h2>
            	<ul><?php
						if(logged_in() === TRUE) {		// chech user loged in
							$userdata = getUserDataByUserId($_SESSION['id']);
							?>
							<li><a><h2><?php echo $userdata['username']; ?></h2></a></li>
                            <li><a href="login_to_course.php"><h2><span class="icon icon-book" style="font-size:20px;"></span> My Course</h2></a></li>
                            <li><a href="logout.php"><h2><span class="icon icon-log-out" style="font-size:20px"></span> Log Out</h2></a></li>
						<?php 
						}else{		// if not user loged in
						?>
                        	<li id="loginBtnNav"><a><h2><span class="icon icon-log-in" style="font-size:20px"></span> Log In</h2></a></li>
                        <?php 
						} ?>
                </ul>
            </li>
        </ul>
    </div>
    <!-- right side coner nav bar item -->
    <div id="AccNavBtnCont">
    	<div id="AccNavBtn">
    		<p><span class="icon icon-user" style="font-size:15px;"></span> Account <span class="icon icon-menu-down" style="font-size:15px;margin:0px"></span></p>
        </div>
        <!-- dropdown -->
    	<div id="loginNavDropDown">
        	<ul><?php
					if(logged_in() === TRUE) { 		// chech user loged in
							$userdata = getUserDataByUserId($_SESSION['id']);
				?>
                <li><a href="user_profile.php"><p><?php echo $userdata['username']; ?></p></a></li>
                <li><a href="login_to_course.php"><p><span class="icon icon-book" style="font-size:15px;"></span> My Course</p></a></li>
                <li><a href="logout.php"><p><span class="icon icon-log-out" style="font-size:15px;"></span> Log Out</p></a></li>
                <?php 
					}else{ 		// if not user loged in
				?>
                <li id="loginNavBtn"><a><p><span class="icon icon-log-in" style="font-size:15px;"></span> Log In</p></a></li>
				<?php 
					} ?>
            </ul>
        </div> 
    </div>
    <!-- nav bar moblile responsive btn -->
    <div id="navMobResBtncont">
    	<div id="navMobResBtn">
			<p id="navShow" style="margin:0px;padding:0px;font-size:30px;margin-top:-6px" >&equiv;</p>
        	<p id="navClose" style="margin:0px;padding:0px;font-size:30px;margin-top:-6px" >&times;</p>
        </div>
    </div>
</nav>

<!-- animated containers -->
<div id="NewsCont">
	<div id="NewsFeeds" style="background-color:transparent;width:100%;height:auto">
    	<h1 style="color:rgba(255,255,255,1.00)">News Feeds</h1>

    </div>
    <div id="CandS" style="background-color:transparent;width:100%;height:auto">
    	<h1 style="color:rgba(255,255,255,1.00)">Club & Societies</h1>

    </div>
    <div id="Other" style="background-color:transparent;width:100%;height:auto">
    	<h1 style="color:rgba(255,255,255,1.00)">Other</h1>

    </div>
</div>

<!-- login container -->
<div id="loginCont" style="min-height:550px">
	<div id="loginC" style="background-color:rgba(0,0,0,0.7);height:auto;width:auto;max-width:285px;margin:auto;padding:20px;border-radius:10px;">
		<div style="width:150px;margin:auto;">
        	<img src="Imgs/LSM_logo_tr.png" alt="" style="width:150px;margin:auto;">
        </div>
        <div style="margin:auto;width:225px">
        <form method="post" name="logIn" action="<?php echo $_SERVER ['PHP_SELF']?>">
        	<table style="border-style:none;background-color:transparent;border:0px">
            	<tr>
                	<td><input type="text" name="username" placeholder="User ID" style="width:200px;height:25px;border-radius:6px;border:0px;margin:10px;text-align:center"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password" style="width:200px;height:25px;border-radius:6px;border:0px;margin:10px;text-align:center"></td>
                </tr>
                <?php 
					if(isset($userError)){ ?> 
                <tr>
                    <td><p id="indexErrorLogIn"><?php echo $userError; ?></p></td>
                </tr> 	
				<?php 
					} ?>
                <tr>
                    <td><p style="text-align:right"><input id="login" type="submit" name="logIn" value="Log In" ></p></td>
                </tr>
             </table>
         </form>
         </div>
	</div>
</div>
<!-- ///////////////////////////////////////// -->
</div>
<!-- page content end -->
</div>
<!-- back end -->

<!-- jQuery -->
<script src="js/jQuery_v3.2.1.js"></script>
<script>
<?php
	if(isset($userError)){ // when user login error 
?>
	$(document).ready(function(e) {
		$('.back').fadeIn(0,
			function(){
				$('#first_load').fadeOut(0);
       			$('#pageContent').fadeIn(300, 
					function(){
						$('#NewsCont>div').fadeOut(300, 
							function(){
								$('#NewsCont').animate({
									width:'0px'
								},300, 
									function(){
										$('#NewsCont').fadeOut(0,
											function(){
												$('#loginCont').fadeIn(300);
											});
									});
							});
					});
	   		});
    });
<?php 	
	}else{ // login success
?>

$(document).ready(function(e) {
    $('.back').fadeIn(300,
		function(){
			$('#first_load_logo_cont').animate({//after back fade in function : 1
				top : '-=220px',
				opacity: '1'
			},300,
				function(){
					$(this).animate({
						top:'+=30px'
					},150, 
						function(){
							$(this).animate({
								top:'-=10px'
							},150);
						});
				});//after back fade in function : 1 END
			$('#first_load_heading').animate({//after back fade in function : 2
				top:'-=180px',
				opacity: '1'
			},300,
				function(){
					$(this).animate({
						top: '+=15px'
					},150,
						function(){
							$(this).animate({
								top: '-=5px'
							},150);
						});
				});//after back fade in function : 2 END
			$('#prog_bar').animate({//after back fade in function : 3
				opacity: '1'
			},300,
				function(){
					$('#firstLoadProgBarIn').animate({
						width:'+=50px'
					},200, 
						function(){
							$(this).animate({
								width:'+=50px'
							},500, 
								function(){
									$(this).animate({
										width: '+=50px'
									},700, 
										function(){
											$(this).animate({
												width: '+=50px'
											},100, 
												function(){
													$('#first_load').fadeOut(300, 
														function(){
															$('#pageContent').fadeIn(300);
														});
												});
										});
								});
						});
				});//after back fade in function : 3 END
		});
});
<?php } ?>



/*setInterval(logoShadow,750);
var fadeC = 0;
function logoShadow(){
	switch (fadeC){
		case 0:
			document.getElementById('firstLoadLMSLogo').className = "firstLoadLMSLogo_c1";
			fadeC = 1;
		break;
		case 1:
			document.getElementById('firstLoadLMSLogo').className = "firstLoadLMSLogo_c2";
			fadeC = 0;
		break;
	}
}*/

</script>
<script>

var i=0;
$('#navMobResBtn').click(function(e){	// when clicking mobile reponsive button
	if(i==0){
		$('#navShow').fadeOut(300, function(){
			$('#navClose').fadeIn(300);
		});
		i=1;
	}else if(i==1){
		$('#navClose').fadeOut(300, function(){
			$('#navShow').fadeIn(300);
		});
		i=0;
	}
	$('#navList').slideToggle(300);
	e.stopPropagation();
});


$('#navList>ul>li:not(#navAccDropDown),#navAccDropDown>ul>li').click(function(){// when clikced nav item nav bar hide
	if(document.getElementById('nav').clientWidth<1000){
	$('#navClose').fadeOut(300, function(){
		$('#navShow').fadeIn(300);
	});
	$('#navList').slideUp(300);
	}
});

function NewsContShow(x){// animated containers animations
	$('#loginCont').fadeOut(300,function(){
		$('#NewsCont>div').fadeOut(300);
		$('#NewsCont').fadeIn();
		$('#NewsCont').animate({
			width:'0px'
		},300, function(){
			$('#NewsCont').animate({
				width:'100%'
			},300, function(){
				if(x=='NewsFeeds'){
					$('#NewsFeeds').fadeIn(300);
				} 
				if(x=='CandS'){
					$('#CandS').fadeIn(300);
				}
				if(x=='Other'){
					$('#Other').fadeIn(300);
				}
				x='';
			});	
		});
	});
}

// nav bar right coner log in 
$('#loginNavBtn,#loginBtnNav').click(function(){
	$('#NewsCont>div').fadeOut(300, function(){
		$('#NewsCont').animate({
			width:'0px'
		},300, function(){
			$('#NewsCont').fadeOut(0,function(){
				$('#loginCont').fadeIn(300);
			});
		});
	});
});

$('#navAccDropDown').click(function(e){// when clicking nav bar dropdown
	$('#navAccDropDown>ul').slideToggle(300);
	e.stopPropagation();
	});
$('#AccNavBtn').click(function(e){
	$('#loginNavDropDown').slideToggle(300);
	e.stopPropagation();
	});
$('#loginNavDropDown>ul>li').click(function(){
	$('#loginNavDropDown').slideUp(300);
	});
$('html:not(#nav)').click(function(){// when clicking in the html not in the nav cont
	$('#loginNavDropDown').slideUp(300);
	$('#navList').slideUp(300);
	$('#navClose').fadeOut(300,
		function(){
			$('#navShow').fadeIn(300);
		});
	});
</script>

</body>
</html>
