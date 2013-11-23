<!DOCTYPE>
<html>
	<head>
	    <script src="script.js">
	    </script>
		<title>
			Feedback The World
		</title>
        <meta name="description" content="Post aggregator" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	    </script>
	</head>
	<body>
		<div id="fb-root">
		</div>
		<div class="greenbar">
			<a href="http://andreip.ro/FeedbackTheWorld/index.html">
				<img src="favicon.png" style="float:left; height: 33px; vertical-align: middle;" />
				<div style="float:left; color: white; vertical-align: middle; margin: 6px;">
						Feedback The World
				</div>
			</a>
			<form>
				<div class="greenform" style="color: white;">
					<?php
						require_once 'src/facebook.php'; //include the facebook php sdk
						$facebook = new Facebook(array(
						        'appId'  => '544279845660803',    //app id
						        'secret' => 'a6301448859eb731401a841f436e0b67', // app secret
						        'allowSignedRequest' => false
						));
						$user = $facebook->getUser();
						if ($user) { // check if current user is authenticated
						    try {
						        // Proceed knowing you have a logged in user who's authenticated.
								//$user_profile = $facebook->api( '/me?fields=id,name', 'GET' );  //get current user's profile information using open graph
								$user_profile = $facebook->getUser();
								echo "Name: " . $user_profile['name'] . \n;
								echo "ID: " . $user_profile['id'] . \n
								echo "Name: " . $user_profile['nameasdddddddddddddddddddd'] . \n;
							}
							catch( FacebookApiException $e ){
								$params = array(
									'scope' => 'read_stream, friends_likes',
									'redirect_uri' => 'https://andreip.ro/FeedbackTheWorld/fbconnect.php'
								);
								$login_url = $facebook->getLoginUrl( $params );
								echo 'Please <a href="' . $login_url . '">login.</a>';
								echo 'Type:' . $e->getType() . "\nMessage: " . $e->getMessage();
							}
						}
					?>
				</div>
			</form>
		</div>
		<div class="page_body">
			<div id="left_post_wrapper">
				<div class="left_side_post">
					<div class="left_post_useful">
						<div class="post_title">
								Titlu
						</div>
						<hr>
						<div class="post_body">
							<div class="post_text">
								<div class="post_breadcrumbs">
									<a href="">Post</a> >> Breadcrumbs
								</div>
								<div class="post_text_preview">
									Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
								</div>
							</div>
							<div class="post_image">
								<img src="circle.png" />
							</div>
						</div>
					</div>
					<div class="left_arrow_wrapper">
						<img src="left_arrow.png" class="left_arrow">
						</img>
						<img src="circle.png" class="left_circle">
						</img>
					</div>
				</div>
				<div class="left_side_post">
					<div class="left_post_useful">
						<div class="post_title">
								Titlu
						</div>
						<hr>
						<div class="post_body">
							<div class="post_text">
								<div class="post_breadcrumbs">
									<a href="">Post</a> >> Breadcrumbs
								</div>
								<div class="post_text_preview">
									Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
								</div>
							</div>
							<div class="post_image">
								<img src="circle.png" />
							</div>
						</div>
					</div>
					<div class="left_arrow_wrapper">
						<img src="left_arrow.png" class="left_arrow">
						</img>
						<img src="circle.png" class="left_circle">
						</img>
					</div>
				</div>
			</div>
			<div id="greenline">
			</div>
			<div id="right_post_wrapper">
				<div class="menu">
					<div class="right_post_useful" style="left: 0px">
						<div class="post_title">
								Meniu
						</div>
						<hr>
						<div class="post_body" style ="float: left; width: 200px;">
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
						<div class="fb-like-box" data-href="http://www.facebook.com/feedback.the.world" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false" style="float: left;"></div>
					</div>
				</div>
				<div class="right_side_post">
					<div class="right_arrow_wrapper">
						<img src="circle.png" class="right_circle">
						</img>
						<img src="right_arrow.png" class="right_arrow">
						</img>
					</div>
					<div class="right_post_useful">
						<div class="post_title">
							Titlu
						</div>
						<hr>
						<div class="post_body">
							<div class="post_text">
								<div class="post_breadcrumbs">
									<a href="">Post</a> > Breadcrumbs
								</div>
								<div class="post_text_preview">
									Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
								</div>
							</div>
							<div class="post_image">
								<img src="circle.png" />
							</div>
						</div>
					</div>
				</div>
				<div class="right_side_post">
					<div class="right_arrow_wrapper">
						<img src="circle.png" class="right_circle">
						</img>
						<img src="right_arrow.png" class="right_arrow">
						</img>
					</div>
					<div class="right_post_useful">
						<div class="post_title">
								Titlu
						</div>
						<hr>
						<div class="post_body">
							<div class="post_text">
								<div class="post_breadcrumbs">
									<a href="">Post</a> >> Breadcrumbs
								</div>
								<div class="post_text_preview">
									Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
								</div>
							</div>
							<div class="post_image">
								<img src="circle.png" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

