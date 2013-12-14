<?php
	require_once('variables.php');
	require_once('functions.php');

	include "config.php";
	include "classes/ArticleManager.php";
?>

<!DOCTYPE>
<html>
	<head>
		<title>
			Feedback The World
		</title>
		<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
		<meta name = "description" content = "Post aggregator" />
		<link rel = "shortcut icon" type = "image/x-icon" href = "img/favicon.ico" />
		<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />		
		<!-- CSS -->
		<link rel = "stylesheet" href = "css/default.css" />

		<!-- Scripts -->
		<script type="text/javascript" language="javascript" src = "js/default.js">
		</script>
	</head>
	<body onload="init()">
		<!-- Facebook -->
		<div id="fb-root">
		</div>

		<!-- Green header -->
		<div id="greenbar">
			<a href="http://andreip.ro/FeedbackTheWorld/default.php">
				<img id = "logo_img" src = "img/favicon.png" />
				<div id = "logo_text">Feedback The World</div>
			</a>

			<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
				<div class="btn-sign">
					<a href="index.php?actionindex=logout" class="logout_option">Logout</a>
        			</div>
				<div class="btn-sign">
					<a href="index.php?actionindex=addarticle" class="article_option">Add article</a>
        			</div>
			<?php } else {?>		
				<div class="btn-sign">
					<a href="#login-box" class="login-window">Login / Sign Up</a>
        			</div>
			<?php } ?>

			<!-- login popup -->
			<div id="login-box" class="login-popup">
				<a href="#" class="close"><img src="img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				<form method="post" class="signin" action="index.php">
					<input type="hidden" name="actionindex" value="login" />					
					<fieldset class="textbox">
						<label class="username">
							<span>Username</span>
							<input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
						</label>
                
						<label class="password">
							<span>Password</span>
							<input id="password" name="password" value="" type="password" placeholder="Password">
						</label>
                
						<button class="submit button loginbtn" type="submit">Sign Up</button>
                
						<p>
							<a href="#authenticate_box" id="open_authBox" class="authenticate-window">Don't have an account? Create a new one!</a>
						</p>
                
					</fieldset>
				</form>
			</div>

			<!-- authenticate popup -->
			<div id="authenticate_box" class="authenticate-popup">
				<a href="#" class="close"><img src="img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				<form method="post" class="authenticate" action="index.php">
					<input type="hidden" name="actionindex" value="authenticate" />					
					<fieldset class="textbox">
						<label class="username">
							<span>Username</span>
							<input id="username" name="usernameAuth" value="" type="text" autocomplete="on" placeholder="Username">
						</label>

						<label class="fullname">
							<span>Full Name</span>
							<input id="fullname" name="fullnameAuth" value="" type="text" autocomplete="on" placeholder="Full name">
						</label>

						<label class="email">
							<span>Email</span>
							<input id="email" name="emailAuth" value="" type="text" autocomplete="on" placeholder="Email">
						</label>
                
						<label class="password">
							<span>Password</span>
							<input id="password" name="passwordAuth" value="" type="password" placeholder="Password">
						</label>

						<label class="password">
							<span>Repeat password</span>
							<input id="repeatPassword" name="repeatPasswordAuth" value="" type="password" placeholder="Repeat password">
						</label>

						<label class="country">
							<span>Country</span>
							<input id="country" name="country" value="" type="text" placeholder="Country">
						</label>

						<label class="address">
							<span>Address</span>
							<input id="address" name="address" value="" type="text" placeholder="Address">
						</label>

						<label class="age">
							<span>Age</span>
							<input id="age" name="age" value="" type="text" placeholder="Age">
						</label>
                
						<button class="submit button authbtn" type="submit">Create Account</button>
                
					</fieldset>
				</form>
			</div>

    		</div>

		<!--articles-->
		<div id="left_post_wrapper">
		</div>
		<div id="greenline">
		</div>
		<div id="right_post_wrapper">
			<div id="menu">
				<div class="right_arrow_wrapper">
				</div>
				<div class="right_post_useful">
					<div class="post_title">
							Meniu
						<hr />
					</div>
					<div class="menu_body">
						<div id="menu_text">
							<ul>
								<li>
									<a class="pointerCursor">
										Cultur&#259;
									</a>
								</li>
								<li>
									<a class="pointerCursor">
										Economie
									</a>
								</li>
								<li>
									<a class="pointerCursor">
										Politic&#259;
									</a>
								</li>
								<li>
									<a class="pointerCursor">
										Sport
									</a>
								</li>
								<li>
									<a class="pointerCursor">
										Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;
									</a>
								</li>
							</ul>
						</div>
						<div class="fb-like-box" data-href="http://www.facebook.com/feedback.the.world" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $articleManager = new ArticleManager();
			$articleList = $articleManager->getArticlesList();

			$i = 0;
			for ($i = 0; $i < count($articleList); $i++) {
				echo '<script>insertNewPost("' . $articleList[$i]->subject . '", "' . $articleList[$i]->body . '", "' . $articleList[$i]->url_image . '", "' . $articleList[$i]->category . '", "' . $articleList[$i]->link . '"); </script>';
			}
		 ?>
	</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('#greenbar').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});

	$('a.authenticate-window').click(function() {
		
		// Getting the variable's value from a link 
		var authBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(authBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(authBox).height() + 24) / 2; 
		var popMargLeft = ($(authBox).width() + 24) / 2; 
		
		$(authBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('#greenbar').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask, #open_authBox').live('click', function() { 
	  $('#mask , .login-popup, .authenticate-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
