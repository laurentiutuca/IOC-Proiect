var n_posts, username, password;

function eraseValue( name ){
	if( name == 'Username' ){
		username.value = '';
		username.style.color = 'black';
	}
	else if( name == 'Password' ){
		password.value = '';
		password.style.color = 'black';
	}
}

function restoreValue( name ){
	if( name == 'Username' ){
		username.value = 'Username';
		username.style.color = 'gray';
	}
	else if( name == 'Password' ){
		password.value = 'Password';
		password.style.color = 'gray';
	}
}

function updateGreenlineLength(){
	greenline = document.getElementById( 'greenline' );
	if( n_posts >= 2 ){
		if( n_posts % 2 == 0 )
			greenline.style.height = 355 + 205 * ( n_posts / 2 - 1 );
		else
			greenline.style.height = 455 + 205 * ( n_posts / 2 - 1 );
	}
}

function insertNewPost( title, text_preview, img_src, category, category_explicit ){
	var side;
	if( n_posts <= 1 || n_posts % 2 == 0 )
		side = 'left';
	else
		side = 'right';

	document.getElementById( side + '_post_wrapper' ).innerHTML += '<div class="' + side + '_side_post"><div class="' + side + '_post_useful"><div class="post_title">' + title +'</div><hr><div class="post_body"><div class="post_text"><div class="post_breadcrumbs"><a href="' + category + '">' + category_explicit + '</a> >> ' + title + '</div><div class="post_text_preview">' + text_preview + '</div></div><div class="post_image"><img src="' + img_src + '" /></div></div></div><div class="' + side + '_arrow_wrapper"><img src="' + side + '_arrow.png" class="' + side + '_arrow"></img><img src="circle.png" class="' + side + '_circle"></img></div></div>';
		n_posts += 1;
}

function facebookLogin(){
	FB.getLoginStatus(function(r){ //check if user already authorized the app
	     if(r.status === 'connected'){
	            window.location.href = 'fbconnect.php';
	     }else{
	        FB.login(function(response) { // opens the login dialog
	                if(response.authResponse) { // check if user authorized the app
	              //if (response.perms) {
	                    window.location.href = 'fbconnect.php';
	            } else {
	              // user is not logged in
	            }
	     },{scope:'email'}); //permission required by the app
	 }
	});
// See more at: http://www.excellencemagentoblog.com/facebook-login-integration-website#sthash.EGreqPdn.dpuf
}

function init(){
	username = document.getElementsByName( 'Username' )[0];
	password = document.getElementsByName( 'Password' )[0];
	n_posts = 0;
	// Load Facebook JavaScript SDK.
	var js, fjs = document.getElementsByTagName( 'script' )[0];
	if (document.getElementById( 'facebook-jssdk' )) return;
	js = document.createElement( 'script' ); js.id = 'facebook-jssdk';
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=544279845660803";
	fjs.parentNode.insertBefore(js, fjs);
	// Initialize facebook login object.
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
	// See more at: http://www.excellencemagentoblog.com/facebook-login-integration-website#sthash.EGreqPdn.dpuf
	};
	// Loading library.
	/* var script = document.createElement( 'script' );
	script.type = 'text/javascript';
	script.src = 'https://';
	document.body.appendChild( script ); */
}
window.onload = init;
