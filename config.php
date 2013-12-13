<?php

$username = "a8946513_andrei";
$password = "f33db@ck";
$hostname = "mysql1.000webhost.com";
$database = "a8946513_ftw";

if( !isset( $connection ) ){
	//connection to the database
	$connection = mysql_connect($hostname, $username, $password) or die( mysql_error() );
	mysql_select_db( $database, $connection );
	$sql = "CREATE TABLE ftwarticles( articleid INT(11), article_authorid INT(11), article_subject VARCHAR(200), article_body VARCHAR(5000), article_review VARCHAR(20000), article_link VARCHAR(50), article_date date, article_categoryid INT(11). article_rating INT(11) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwcategories( categoryid INT(11), category_name INT(11), category_date INT(11) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwposts( postid INT(11), post_authorid INT(11), post_body VARCHAR(2000), post_articleid INT(11), post_date date, post_rating INT(11) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwrights( rightid INT(11), right_name VARCHAR(20) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwtyperights( id INT(11), typeid INT(11),rightid INT(11) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwtypes( typeid INT(11), type_name VARCHAR(20), type_minrating INT(11), type_maxrating INT(11) )";
	mysql_query( $sql );
	$sql = "CREATE TABLE ftwusers( userid INT(11), username VARCHAR(20), user_fullname VARCHAR(50), user_email VARCHAR(50), user_passwordhash VARCHAR(50), user_country VARCHAR(20), user_address VARCHAR(30), user_age int(11), user_rating int(11), user_typeid int(11), user_lastlogin date, user_sessions int(11) )";
	mysql_query( $sql );
}

?>
