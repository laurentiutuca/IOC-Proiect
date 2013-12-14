var n_posts, username, password, auth;

function login() {

	username = document.getElementById( 'Username' ).value;
	password = document.getElementById( 'Password' ).value;
	if( username == undefined || password == undefined || username == 'Username' || password == 'Password' )
		alert( 'Incorrect username / password.' );
	else
		window.location.href = 'default.php?auth=yes&username=' + document.getElementById( 'Username' ).value;
}

function signup() {
	if( username == undefined || password == undefined || username == 'Username' || password == 'Password' )
		alert( 'Incorrect username / password.' );
	else
		alert( 'You are now signed up as ' + document.getElementById( 'Username' ).value + '. Try logging in!' );
}

function eraseValue( name ){
	if( name == 'Username' && username.value == 'Username' ){
		username.value = '';
		username.style.color = 'black';
	}
	else if( name == 'Password' && password.value == 'Password'  ){
		password.type = 'password';
		password.value = '';
		password.style.color = 'black';
	}
}

function restoreValue( name ){
	if( name == 'Username' && username.value == '' ){
		username.value = 'Username';
		username.style.color = 'gray';
	}
	else if( name == 'Password' && password.value == '' ){
		password.type = 'text';
		password.value = 'Password';
		password.style.color = 'gray';
	}
}

function updateGreenlineLength(){
	greenline = document.getElementById( 'greenline' );
	if( n_posts >= 2 ){
		if( n_posts % 2 == 0 )
			greenline.style.height = 355 + 238 * ( n_posts / 2 - 1 );
		else
			greenline.style.height = 455 + 238 * ( n_posts / 2 - 1 );
	}
}

function checkJS() {
	alert("here");
}

function insertNewPost(n_posts, title, text_preview, img_src, category, category_explicit, url ){
	var side;

	if( n_posts <= 1 ){
		side = 'left';
	}
	else{
		if( n_posts % 2 == 0 )
			side = 'right';
		else
			side = 'left';
	}
	for( i = 300; i < text_preview.length; i += 1 ){
		if( text_preview[i] == ' ' ){
			text_preview = text_preview.substr( 0, i ) + '...';
			break;
		}
	}
	a_href = '<a id="a_href_articol" href="article.php?title=' + title + '&text_preview=' + text_preview + '&img_src=' + img_src + '&category=' + category_explicit + '&category_explicit=' + category_explicit + '&url=' + url + '">';
	text_preview += '<br />' + '<a href="article.php?title=' + title + '&text_preview=' + text_preview + '&img_src=' + img_src + '&category=' + category_explicit + '&category_explicit=' + category_explicit + '&url=' + url + '">' + 'Cite&#x219;te tot articolul...</a>'
	document.getElementById( side + '_post_wrapper' ).innerHTML += '' +
				'<div class="' + side + '_side_post">' + 
					'<div class="' + side + '_post_useful">' + 
						a_href + 
							'<div class="post_title">' + 
								title +
								'<hr />' + 
							'</div>' + 
						'</a>' + 
						'<div class="post_body">' + 
							'<div class="post_text">' + 
								'<div class="post_breadcrumbs">' + 
									'<a href="">' +
										category +
									'</a>' + 
									' >> ' + title +
								'</div>' + 
								a_href + 
									'<div class="post_text_preview">' + 
									'<br>' +
										text_preview +
									'</div>' + 
								'</a>' + 
							'</div>' + 
							a_href + 
								'<div class="post_image">' + 
									'<img src=' + img_src + ' height=150px; width=150px; style="position: relative; left: 30px; top: 20px;" />' + 
								'</div>' + 
							'</a>' + 
						'</div>' + 
					'</div>' + 
					'<div class="' + side + '_arrow_wrapper">' + 
						'<img src = "img/' + side + '_arrow.png" class="' + side + '_arrow">' + 
						'</img>' + 
						'<img src = "img/circle.png" class="' + side + '_circle">' + 
						'</img>' + 
					'</div>' + 
				'</div>';
	n_posts += 1;
	updateGreenlineLength();
}

function facebookLogin(){
	FB.getLoginStatus(function(r){ //check if user already authorized the app
	     if(r.status === 'connected'){
	            window.location.href = 'default.php?auth=yes';
	     }else{
	        FB.login(function(response) { // opens the login dialog
	                if(response.authResponse) { // check if user authorized the app
	              //if (response.perms) {
	                    window.location.href = 'default.php';
	            } else {
	              // user is not logged in
	            }
	     },{scope:'email'}); //permission required by the app
	 }
	});
// See more at: http://www.excellencemagentoblog.com/facebook-login-integration-website#sthash.EGreqPdn.dpuf
}

function facebookLogin(){

	permissions = {
		scope:'email'
	};

	function FBlogin( r ){
		if( r.authResponse ){
			window.location.href = 'default.php?auth=yes';
		}
		else{
			window.location.href = 'default.php';
		}
	}

	function checkAuthorization( r ){
		if( r.status === 'connected' ){
			window.location.href = 'default.php?auth=yes';
		} else {
			FB.login( FBlogin, permissions );
		}
	}
	FB.getLoginStatus( checkAuthorization );
	// See more at: http://www.excellencemagentoblog.com/facebook-login-integration-website#sthash.EGreqPdn.dpuf
}

function putAuthIna_href(){
	document.getElementById( 'a_href_articol' ).href += '&auth=yes';
}

function init(){
	n_posts = 0;
	// Load Facebook JavaScript SDK.
	var js, fjs = document.getElementsByTagName( 'script' )[0];
	if (document.getElementById( 'facebook-jssdk' )) return;
	js = document.createElement( 'script' ); js.id = 'facebook-jssdk';
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=544279845660803";
	fjs.parentNode.insertBefore( js, fjs );
	username = document.getElementById( 'Username' );
	password = document.getElementById( 'Password' );
	auth = '<?php echo $auth; ?>';
	// Initialize facebook login object.
	/*
	window.fbAsyncInit = function() {
		FB.init(
			{
				appId      : '544279845660803', // App ID
				channelURL : '', // Channel File, not required so leave empty
				status     : true, // check login status
				cookie     : true, // enable cookies to allow the server to access the session
				oauth      : true, // enable OAuth 2.0
				xfbml      : false  // parse XFBML
			}
		);
	};
	*/
	// See more at: http://www.excellencemagentoblog.com/facebook-login-integration-website#sthash.EGreqPdn.dpuf
	// Loading library.
	/* var script = document.createElement( 'script' );
	script.type = 'text/javascript';
	script.src = 'https://';
	document.body.appendChild( script ); */
}
