<!DOCTYPE>
<html>
	<head>
		<script type="text/javascript" language="javascript" src="ratingsys.js"></script>
		<script src="tabcontent.js" type="text/javascript"></script>
	    <script src="script.js">
	    </script>
		<title>
			Feedback The World
		</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="description" content="Post aggregator" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		
		<!-- css pt stele -->
		<style type="text/css">
			#rateStatus{float:left; clear:both; width:100%; height:20px;}
			#rateMe{float:left; clear:both; width:100%; height:20px; padding:0px; margin:0px;}
			#rateMe li{float:left;list-style:none;}
			#rateMe li a:hover,
			#rateMe .on{background:url(images/star_on.png) no-repeat;}
			#rateMe a{float:left;background:url(images/star_off.png) no-repeat;width:20px; height:25px;}
			#ratingSaved{display:none;}
			.saved{color:red; }
		</style>
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
					$title = $_GET["title"];
					$text_preview = $_GET["text_preview"];
					$img_src = $_GET["img_src"];
					$category = $_GET["category"];
					$category_explicit = $_GET["category_explicit"];
					$url = $_GET["url"];
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
	<div style="margin-top: 40px">
	<a href="default.php">Home</a> >> <a href=#><?php echo $category_explicit; ?></a> >> <?php echo $title; ?> <br /><!-- aici -->
	<table border="1" bordercolor="green" width=100%>
		<tr>
			<td>
			<strong><?php echo $title; ?></strong><br \><!-- aici -->
			<a href=<?php echo $url; ?> style="color: black; text-decoration: none;"><?php echo $text_preview; ?><br><img src=<?php echo $img_src; ?> /></a><br \><br \><!-- aici -->
			</td>
		</tr>
	</table>
	<br \>
    <div style="width: 100%; margin: 0 auto;">
        <ul class="tabs" data-persist="true">
            <li><a href="#authoropinion">Author opinion</a></li>
            <li><a href="#useropinion">Users opinion</a></li>
            <li><a href="#ftwresults">FtW results</a></li>
        </ul>
        <div class="tabcontents">
            <div id="authoropinion">
                <p><font color="black">Parerea autorului :)</font></font></p><!-- aici -->
				<div align="left" style="height:30px">
					<span id="rateStatus">Rate this comment</span>
					<span id="ratingSaved">Rating Saved!</span>
					<div id="rateMe" title="Rate this comment" align="right" height="50">
						<a onclick="rateIt(this)" id="_1" title="meh" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_2" title="Not Bad" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_3" title="Pretty Good" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_4" title="Very good" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_5" title="Excellent" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_6" title="I love it" onmouseover="rating(this)" onmouseout="off(this)"></a>
					</div>
				</div>
                
            </div>
            <div id="useropinion">
				<ul class="tabs" data-persist="true">
				<li><a href="#mostrecent">Most recent</a></li>
				<li><a href="#ftwrating">FtW rating</a></li>
				</ul>
				<div class="tabcontents">
					<div id="mostrecent">
					<table width=100% boarder="1" bordercolor="green"><tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20">21</span> <b>Nume Prenume</b><span style="float:right">10/10/2013</span>
						<br \><img src="images/rank6.png" height="20"></img>
						<p><font color="black">Eu cred ca pitong</font></p><!-- aici -->
						<p>
							<span style="text-align:right">
							<font color="green">
								<form style="text-align:right"><input type="radio" name="agree" value="yes">I agree<input type="radio" name="agree" value="no">I don't agree</form>
							</font>
							</span>
							<span style="float:left">
							<a href=# style="color:green">All this author posts</a> | <a href=# style="color:green">Read full post</a>
							</span>
						</p>
					</td></tr></table>
					</div>
					<div id="ftwrating">
						<table width=100% boarder="1" bordercolor="green"><tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20">21</span> <b>Nume Prenume</b><span style="float:right">10/10/2013</span>
						<br \><img src="images/rank10.png" height="20"></img>
						<p><font color="black">Eu cred ca pitong</font></p><!-- aici -->
						<p>
							<span style="text-align:right">
							<font color="green">
								<form style="text-align:right"><input type="radio" name="agree" value="yes">I agree<input type="radio" name="agree" value="no">I don't agree</form>
							</font>
							</span>
							<span style="float:left">
							<a href=# style="color:green">All this author posts</a> | <a href=# style="color:green">Read full post</a>
							</span>
						</p>
					</td></tr></table>
					</div>
				</div>              
            </div>
            <div id="ftwresults">
                <b>Conclusion</b>
                <p><img src="approved.jpg"></img></p>
            </div>
        </div>
    </div>
	</body>
</html>