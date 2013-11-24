<!DOCTYPE>
<html>
	<head>
	    <script src="script.js">
	    </script>
		<title>
			Feedback The World
		</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="description" content="Post aggregator" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	    </script>
	</head>
	<body>
		<div id="fb-root">
		</div>
		<div class="greenbar">
			<a href="http://andreip.ro/FeedbackTheWorld/default.php">
				<img src="favicon.png" style="float:left; height: 33px; vertical-align: middle;" />
				<div style="float:left; color: white; vertical-align: middle; margin: 6px;">
						Feedback The World
				</div>
			</a>
			<form>
				<?php
					if( $_GET["auth"] == 'yes' ){
						require_once 'src/facebook.php'; //include the facebook php sdk
						$facebook = new Facebook(array(
						        'appId'  => '544279845660803',    //app id
						        'secret' => 'a6301448859eb731401a841f436e0b67', // app secret
						        'allowSignedRequest' => false
						));
						$user = $facebook->getUser();
						if ($user) { // check if current user is authenticated
							$auth = 'yes';
						    try {
						        // Proceed knowing you have a logged in user who's authenticated.
								//$user_profile = $facebook->api( '/me?fields=id,name', 'GET' );  //get current user's profile information using open graph
								$user_profile = $facebook->api( '/' . $user );
								echo $user_profile['name'];
							}
							catch( FacebookApiException $e ){
								$params = array(
									'canvas' => 0,
									'fbconnect' => 1,
									'scope' => 'read_stream, friends_likes',
									'redirect_uri' => 'https://andreip.ro/FeedbackTheWorld/default.php?auth=yes'
								);
								/*
								echo 'Type: ' . $e->getType() . " \nMessage: " . $e->getMessage();
								$login_url = $facebook->getLoginUrl( $params );
								echo 'Please <a href="' . $login_url . '">login.</a>';
								*/
							}
						}
						echo '
							<div class="greenform" style="color: white;">
								<a href="default.php" class="greenform">
									<input class="greenform" type="button" name="logout_button" value="Log out" />
								</a>
								<div class="greenform">
									Logged in.
								</div>
							</div>
						';
					}
					else{
						echo '
							<img class="greenform" src="facebook.png" align="middle" onclick="facebookLogin()" style="cursor: pointer; height: 33px;" />
							<a href="http://andreip.ro/FeedbackTheWorld/default.php?auth=yes">
								<input class="greenform" type="button" name="signup_button" value="Sign up" />
							</a>
							<a href="http://andreip.ro/FeedbackTheWorld/default.php?auth=yes">
								<input class="greenform" type="button" name="login_button" value="Login" />
							</a>
							<input class="greenform" onfocus="eraseValue( \'Password\' )" onblur="restoreValue( \'Password\' )" type="password" name="Password" value="Password"  style="color: gray" />
							<input class="greenform" onfocus="eraseValue( \'Username\' )" onblur="restoreValue( \'Username\' )" type="text" name="Username" value="Username"  style="color: gray" />
						';
					}
				?>
			</form>
		</div>
		<div class="page_body">
			<div id="left_post_wrapper">
			</div>
			<div id="greenline">
			</div>
			<div id="right_post_wrapper">
				<div class="right_side_post" style="height: 300px;">
					<div class="right_arrow_wrapper">
					</div>
					<div class="right_post_useful">
						<div class="post_title">
								Meniu
						</div>
						<hr>
						<div class="post_body">
							<div class="post_text" style="display: inline-block; float: left;">
								<ul>
									<li>
										<a href="">
											Cultur&#259;
										</a>
									</li>
									<li>
										<a href="">
											Economie
										</a>
									</li>
									<li>
										<a href="">
											Politic&#259;
										</a>
									</li>
									<li>
										<a href="">
											Sport
										</a>
									</li>
									<li>
										<a href="">
											Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;
										</a>
									</li>
								</ul>
							</div>
							<div class="fb-like-box" style="display: inline-block; float: left;" data-href="http://www.facebook.com/feedback.the.world" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" style="float: left;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>