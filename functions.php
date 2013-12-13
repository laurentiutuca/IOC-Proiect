<?php
	
	require_once 'variables.php';

	// Load database.
	function connectToDatabase(){
		$mysql_host = "mysql1.000webhost.com";
		$mysql_database = "a8946513_ftw";
		$mysql_user = "a8946513_andrei";
		$mysql_password = "f33db@ck";
		$connection = mysqli_connect( $mysql_host, $mysql_user, $mysql_password, $mysql_database );
		if( mysqli_connect_errno( $connection ) ){
			$error = "Failed to connect to users MySQL database: " . mysqli_connect_error() . '\n';
			return false;
		}

		return $connection;
	}

	function closeConnectionToDatabase(){
		mysqli_close( $connection );
	}

	function printErrors(){
		print '<script type = "text/javscript">';
		print 'alert( $error )';
		print '</script>';
	}

	function createAuthenticationForm(){
		// If authenticated.
		if( $auth == 'yes' ){
			require_once 'facebook/facebook.php';
			$facebookOptions = array(
				'appId'  => '544279845660803',
				'secret' => 'a6301448859eb731401a841f436e0b67',
				'allowSignedRequest' => false
			);
			$facebook = new Facebook( $facebookOptions );
			$user = $facebook->getUser();
			if( $user ){ // check if current user is authenticated
				$auth = 'yes';
			    try {
			        // Proceed knowing you have a logged in user who's authenticated.
					//$user_profile = $facebook->api( '/me?fields=id,name', 'GET' );  //get current user's profile information using open graph
					$user_profile = $facebook->api( '/' . $user );
					echo $user_profile['name'];
				}
				catch( FacebookApiException $e ){
					$error = $error . 'Type: ' . $e->getType() . " \nMessage: " . $e->getMessage();
				}
			}
			if( $_GET['username'] ){
				$username = ' as ' . $_GET['username'];
			}
			else{
				if( $user_profile['name'] )
					$username = ' as ' . $user_profile['name'];
				else
					$username = ' as guest';
			}
			echo '
				<div class = "floatRight">
					<div class="greenform_left colorWhite">
						&nbsp;Logged in' . $username . '.&nbsp;
					</div>
					<a class="greenform_left" href="default.php">
						<input class type="button" name="logout_button" value="Log out" />
					</a>
				</div>
			';
		}
		else{
			echo '
				<div class = "floatRight">
					<input id="Username" class="greenform_left" onfocus="eraseValue( \'Username\' )" onblur="restoreValue( \'Username\' )" type="text" name="Username" value="Username"  style="color: gray" />
					<input id="Password" class="greenform_left" onfocus="eraseValue( \'Password\' )" onblur="restoreValue( \'Password\' )" type="text" name="Password" value="Password"  style="color: gray" />
					<input class="greenform_left" type="button" name="login_button" value="Login" onclick="login()" />
					<input class="greenform_left" type="button" name="signup_button" value="Sign up" onclick="signup()" />
					<img class="greenform_left pointerCursor inHeader" src="img/facebook.png" align="middle" onclick="facebookLogin()" />
				</div>
			';
		}
	}
?>
