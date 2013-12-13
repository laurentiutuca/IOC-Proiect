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

function insertNewPost( title, text_preview, img_src, category, category_explicit, url ){
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
	string = '\n&#8226; o expozi&#x21B;ie semnat&#x103; Andreea RADU\n&#8226;&#xCE;n perioada 20 noiembrie &#8211; 15 decembrie 2013, la Artexpert Gallery din Cluj-Napoca (Str. Iuliu Maniu nr. 10) poate fi vizitat&#x103; expozi&#x21B;ia personal&#x103; de pictur&#x103; a artistei clujene Andreea Radu. Intitulat&#x103; GR&#258;DINI, actuala expozi&#x21B;ie continu&#x103; &#351;i dezvolt&#x103; pe un plan superior universul purt&#238;nd matricea acelui optimism tonic, reconfortant, ce m&#238;ng&#238;ie sim&#x21B;urile, pe care-l deslu&#351;eam &#351;i &#238;n expozi&#x21B;ia deschis&#x103; &#238;n luna noiembrie a anului trecut, &#238;n aceea&#351;i galerie.';
	insertNewPost( 'Gr&#259;dini', string, 'http://www.ziarulfaclia.ro/wp-content/uploads/2013/11/2_camp_a-300x250.jpg', 'Cultur&#259;', 'Cultur&#259;', 'http://www.ziarulfaclia.ro/gradini/' );
	insertNewPost( 'Sova: BEI, BERD si BM, interesate sa finanteze Comarnic-Brasov', '\nConstructorul va fi desemnat in decembrie/ Nu stiu cat va genera acciza de 7 eurocenti la carburanti. Eu as vrea sa finanteze numai autostrazi', 'http://media.hotnews.ro/media_server1/image-2013-11-24-16065745-46-dan-sova-dupa-20-ani.png', 'Economie', 'Economie', 'http://revistapresei.hotnews.ro/stiri-radio_tv-16065742-sova-bei-berd-interesate-finanteze-comarnic-brasov-constructorul-desemnat-decembrie-nu-stiu-cat-genera-acciza-7-eurocenti-carburanti-vrea-finanteze-numai-autostrazi.htm' );
	string = '\nPre&#351;edintele Camerei Deputa&#x21B;ilor, Valeriu Zgonea, spune c&#x103; cererea PDL ca Parchetul s&#x103; se autosesizeze &#238;n privin&#x21B;a terenurilor Ioanei B&#x103;sescu reprezint&#x103; &quot;un tertip&quot; &#351;i ar fi o &quot;mare gre&#351;eal&#x103;&quot;, &#238;n timp ce vicepre&#351;edintele PDL Cezar Preda afirm&#x103; c&#x103; &quot;tertipul&quot; este comisia parlamentar&#x103; &#238;n acest caz.';
	insertNewPost( 'Zgonea: Cererea PDL la Parchet pe terenul lui B&#x103;sescu, un tertip', string, 'http://media.realitatea.ro/multimedia/image/201311/w728/valeriu_zgonea_62923100_17998400_62135000_99371800_36294500.jpg', 'Politic&#259;', 'Politic&#259;', 'http://www.realitatea.net/zgonea-cererea-pdl-la-parchet-pe-terenul-lui-basescu-un-tertip_1323975.html' );
	insertNewPost( 'A castigat cu 6-0 impotriva lui Chiriches, dar primeste...', '\nAnuntul de ULTIMA ora facut de Pellegrini! Ce se intampla cu Panti: Manchester City a demolat astazi Tottenham-ul lui Andre Villas Boas si Chiriches, echipa milionarilor de pe Ettihad, cu Pantilimon titular, castigand cu 6-0 in fata rivalilor londonezi.', 'http://assets.sport.ro/assets/sport/2013/11/24/image_galleries/192083/a-castigat-cu-6-0-impotriva-lui-chiriches-dar-primeste-o-veste-teribila-anuntul-de-ultima-ora-facut-de_size1.jpg', 'Sport', 'Sport', 'http://www.sport.ro/stranieri/a-castigat-cu-6-0-impotriva-lui-chiriches-dar-primeste-o-veste-teribila-anuntul-de-ultima-ora-facut-de.html' );
	string = '\n&#xCE;ncep&#226;nd de ast&#x103;zi comenta ISON nu va mai putea fi observat&#x103;, o vreme, deoarece este prea aproape de Soare. Este doar o situa&#539;ie provizorie, iar cometa va redeveni vizibil&#x103; &#238;n jurul zilei de 5 decembrie, conform simulatorului Comet ISON flyby simulation, pe care vi-l recomandam &#238;ntr-o postare anterioar&#x103;.';
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
	insertNewPost( 'Cometa ISON se apropie inexorabil de Soare (foto, video)', string, 'http://stiintasitehnica.com/wp-content/uploads/2013/11/20131114-ISON-RGB-60-SEC-D-1024x1024.jpg', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'Tehnologie &#x219;i &#x219;tiin&#x21B;&#259;', 'http://stiintasitehnica.com/stiri/cometa-ison-este-vizibila-cu-ochiul-liber/index.html' );
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
