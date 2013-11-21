// Load libraries with window.


function eraseValue( name ){
	if( name == 'Username' )
		username.value = '';
	else if( name == 'Password' )
		password.value = '';
}

function restoreValue( name ){
	if( name == 'Username' )
		username.value = 'Username';
	else if( name == 'Password' )
		password.value = 'Password';
}

function init(){
username = document.getElementsByName( 'Username' )[0];
password = document.getElementsByName( 'Password' )[0];
	// Loading library.
	/* var script = document.createElement( 'script' );
	script.type = 'text/javascript';
	script.src = 'https://';
	document.body.appendChild( script ); */
}
window.onload = init;
