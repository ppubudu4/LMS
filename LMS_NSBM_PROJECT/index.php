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
<link rel="stylesheet" href="css/footer.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/1.css" type="text/css">
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
        <a href="index.php"><img src="Imgs/logo_ico_with_shadow.png" style="max-width:100px" alt="NSBM Logo" ></a>
    </div>
    <!-- nav list -->
    <div id="navList">
    	<ul>
        	<li onClick="NewsContShow('NewsFeeds')"><h2>News Feeds</h2></li>
            <li onClick="NewsContShow('CandS')"><h2>Events</h2></li>
            <li onClick="NewsContShow('Other')"><h2>About NSBM</h2></li>
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
    <div id="NewsFeedsCont">
    	<h1 style="color:rgba(255,255,255,1.00)">News Feeds</h1>
		<div class="slideshow-container">
            	<div class="mySlides fade">
                	<div class="numbertext">1 / 3</div>
                    <img src="resources/css/img/Poson.jpg" style="width:100%" alt="">        
                </div>
				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
                	<img src="resources/css/img/Sathkara.jpg" style="width:100%" alt="">
                	<div class="text">Donations for Flood Victims</div>
				</div>
				<div class="mySlides fade">
                	<div class="numbertext">3 / 3</div>
                    	<img src="resources/css/img/Vesak%20Kalapaya.jpg" style="width:100%" alt="">
                        <div class="text">Price Giving of Vesak NSBM Kalapaya</div>
             	</div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
        <div style="text-align:center">
            	<span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        <div class="hero-text-box">
                <h1>Quality teaching<br>succesfull students Use it yourself.!.</h1>
        </div>
    </div>
    </div>
    <div id="CandS" style="background-color:transparent;width:100%;height:auto">
    	<h1 style="color:rgba(255,255,255,1.00)">Events</h1>
        <div class="countdownMainContainer">
        	<div class="countDownRow">
        		<div class="countDownCol" id="event1">
                	<div class="countDownColPanel">
                        <div class="countdownContainer">
                            <table align="center">
                                <tr class="info1">
                                    <td colspan="4">Event Starts In</td>
                                </tr>
                                <tr class="info">
                                    <td id="days1" class="days">00</td>
                                    <td id="hours1" class="hours">00</td>
                                    <td id="minutes1" class="minutes">00</td>
                                    <td id="seconds1" class="seconds">00</td>
                                </tr>
                                <tr id="dis" class="dis">
                                    <td>Days</td>
                                    <td>Hours</td>
                                    <td>Minutes</td>
                                    <td>Seconds</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            	<div class="countDownCol" id="event2">
                	<div class="countDownColPanel">
                        <div class="countdownContainer">
                            <table align="center">
                                <tr class="info1">
                                    <td colspan="4">Event Starts In</td>
                                </tr>
                                <tr class="info">
                                    <td id="days2" class="days">00</td>
                                    <td id="hours2" class="hours">00</td>
                                    <td id="minutes2" class="minutes">00</td>
                                    <td id="seconds2" class="seconds">00</td>
                                </tr>
                                <tr id="dis" class="dis">
                                    <td>Days</td>
                                    <td>Hours</td>
                                    <td>Minutes</td>
                                    <td>Seconds</td>
                                </tr>
                            </table>
                        </div>
                    </div>
            	</div>
        	</div>
        	<div class="countDownRow">
        		<div class="countDownCol" id="event3">
                	<div class="countDownColPanel">
                        <div class="countdownContainer">
                            <table align="center">
                                <tr class="info1">
                                    <td colspan="4">Event Starts In</td>
                                </tr>
                                <tr class="info">
                                    <td id="days3" class="days">00</td>
                                    <td id="hours3" class="hours">00</td>
                                    <td id="minutes3" class="minutes">00</td>
                                    <td id="seconds3" class="seconds">00</td>
                                </tr>
                                <tr id="dis" class="dis">
                                    <td>Days</td>
                                    <td>Hours</td>
                                    <td>Minutes</td>
                                    <td>Seconds</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            	<div class="countDownCol" id="event4">
                	<div class="countDownColPanel">
                        <div class="countdownContainer">
                            <table align="center">
                                <tr class="info1">
                                    <td colspan="4">Event Starts In</td>
                                </tr>
                                <tr class="info">
                                    <td id="days4" class="days">00</td>
                                    <td id="hours4" class="hours">00</td>
                                    <td id="minutes4" class="minutes">00</td>
                                    <td id="seconds4" class="seconds">00</td>
                                </tr>
                                <tr id="dis" class="dis">
                                    <td>Days</td>
                                    <td>Hours</td>
                                    <td>Minutes</td>
                                    <td>Seconds</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
       		</div>
        </div>
        

    </div>
    <div id="Other" style="background-color:transparent;width:100%;height:auto">
    	<h1 style="color:rgba(255,255,255,1.00)">About NSBM</h1>
        <div style="background-color:background-color:green";opacity:'0.5'>
		<p style="color:rgba(255,255,255,1.00)" >
        	NSBM Green University Town is the first ever green university in South Asia and sets an example for the whole South Asia by paving the way for environmental sustainability. The university is open for both national and international student community and it has turned a new chapter in Sri Lankan higher education.
		</p > <p style="color:rgba(255,255,255,1.00)">
NSBM Green University Town is established under the Ministry of Skills Development and Vocational Training and it is renowned for its world-class academic offerings. This state-of-the-art university offers nationally and internationally recognized, UGC approved degree programmes and foreign degree programmes in three faculties: Management, Computing and Engineering.
</p>
<p style="color:rgba(255,255,255,1.00)">
The university is spread over an area of 26 acres and the massive university complex was built with the intention of providing an opportunity for both national and international students to have a fully-fledged education in Sri Lanka. Currently around 9000 students are studying at the university and the highly qualified local and foreign lecturers who teach at the university are committed to prepare these undergraduates to face any challenge the world has to offer. The university’s commitment to excellence in education extends beyond course delivery since the university has created mutually beneficial relationships with the industry to provide students with opportunities to get exposure to the real- world work places.
</p><p style="color:rgba(255,255,255,1.00)">
Inspired by the vision of making Sri Lanka the best educational hub in Asia, NSBM Green University Town is dedicated to gift the future leaders to the world with its fully fledged university..
</p>

<h1 style="color:rgba(255,255,255,1.00)">Vision</h1>
<p style="color:rgba(255,255,255,1.00)">
To be Sri Lanka’s best performing Graduate School and to be recognized internationally
</p>

<h1 style="color:rgba(255,255,255,1.00)">Mission</h1>
<p style="color:rgba(255,255,255,1.00)">
To develop globally competitive and responsible graduates that businesses demand, working in synergy with all our stakeholder and contributing to our society

</p>
        </div>
    </div>
</div>

<!-- login container -->
<div id="loginCont">
	<div id="loginC">
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


<div style="width:100%;height:auto;position:absolute">
<footer class="footer-main" style="min-height:220px;position:absolute;">
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
			<p class="footer-name">Copyright © All rights reserved, | Design & Developed by brothers</p>
        </div>
    </div>
	<div class="footer-center" >
		<div class="footer-center-cont">
        <div>
			<img src="imgs/Icons/locationW.png">
			<p><span> Pitipana Post Office,</span>  Homagama 10206, Sri Lanka.</p>
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
<p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>

<p>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
    <img style="border:0;width:88px;height:31px"
        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
        alt="Valid CSS!" />
    </a>
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

<!-- ///////////////////////////////////////// -->
</div>
<!-- page content end -->
</div>
<!-- back end -->

<!-- jQuery -->
<script src="js/jQuery_v3.2.1.js"></script>
<script type="text/javascript">
var countTimer = 0;

			function countdown(event_no , year , month , day){
				var now = new Date();
				var eventDate = new Date(year, month, day);

				var currentTiime = now.getTime();
				var eventTime = eventDate.getTime();

				var remTime = eventTime - currentTiime;

				var s = Math.floor(remTime / 1000);
				var m = Math.floor(s / 60);
				var h = Math.floor(m / 60);
				var d = Math.floor(h / 24);

				h %= 24;
				m %= 60;
				s %= 60;

				h = (h < 10) ? "0" + h : h;
				m = (m < 10) ? "0" + m : m;
				s = (s < 10) ? "0" + s : s;

				document.getElementById("days"+event_no).textContent = d;
				document.getElementById("days"+event_no).innerText = d;

				document.getElementById("hours"+event_no).textContent = h;
				document.getElementById("minutes"+event_no).textContent = m;
				document.getElementById("seconds"+event_no).textContent = s;

			}
			function countdownTimer(){
				countdown(1,2017,06,23);
				countdown(2,2017,08,16);
				countdown(3,2017,09,16);
				countdown(4,2017,8,20);
				setTimeout(countdownTimer, 1000);
			}
			countdownTimer();
			
			var padding = 20;
			var padding1 = 0;
			function coutDownAni(){
				$('.seconds').animate({
					paddingBottom: ""+padding+"px",
					},100 ,
						function(){
							$(this).animate({
								paddingBottom: ""+padding1+"px",
							});
							$('.minutes').animate({
								paddingBottom: ""+padding+"px",
							},100,function(){
								$(this).animate({
									paddingBottom: ""+padding1+"px",
								},100);
								$('.hours').animate({
									paddingBottom: ""+padding+"px",
								},100,
									function(){
										$(this).animate({
											paddingBottom: ""+padding1+"px",
										},100);
										$('.days').animate({
											paddingBottom: ""+padding+"px",
										},100,
											function(){
												$(this).animate({
													paddingBottom: ""+padding1+"px",
												},100);
											});	
									});
									
							});

					});			
			}
			function countDownCont(){
			if(countTimer==0){
				$('.countdownContainer').css("background-color","rgba(25,88,157,0.7)");
				coutDownAni();
				countTimer=1;
			}else if(countTimer==1){
				$('.countdownContainer').css("background-color","rgba(60,181,76,0.7)");
				coutDownAni();
				countTimer=0;
			}
				
				setTimeout(countDownCont, 1000);
			}
			countDownCont();
		</script>
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

/*$('#navAccDropDown').click(function(e){// when clicking nav bar dropdown
	$('#navAccDropDown>ul').slideToggle(300);
	e.stopPropagation();
	});*/
$('#navAccDropDown').hover(function(){//nav drop down mobile display only
	$('#navAccDropDown>ul').slideDown(200);
	} , function(){
		$('#navAccDropDown>ul').slideUp(200);
		});
$('#AccNavBtn').click(function(e){//account drop down
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
<script>
var slideIndex = 1;
showSlides(slideIndex);

 function plusSlides(n) {
 	showSlides(slideIndex += n);
 }

function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
    	slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex =1}    
    	for (i = 0; i < dots.length; i++) {
        	dots[i].className = dots[i].className.replace(" active", "");
        }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 10000); // Change image every 2 seconds
}
</script>
</body>
</html>
