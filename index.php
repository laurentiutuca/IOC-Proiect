<?php
	include "config.php";
	include "classes/User.php";

	require_once 'variables.php';
	require_once 'functions.php';

	if (isset($_POST['actionindex'])) {
		switch($_POST['actionindex']) {
			case 'login':
				if (isset($_POST['username']) && isset($_POST['password'])) {
					// escape | validate inputs
					$username = trim($_POST['username']);
					$password = trim($_POST['password']);

					// valid inputs
					if ($username != '' && $password != '') {
						$user = new User();
						$user->setAttributes($username, $password);
						$validUser = $user->login();
						var_dump($validUser); die();
					}	
				}
				break;

			case 'authenticate':
				if (isset($_POST['usernameAuth']) && isset($_POST['passwordAuth']) && isset($_POST['emailAuth']))
				$username = trim($_POST['usernameAuth']);
				$password = trim($_POST['passwordAuth']);
				$email = trim($_POST['emailAuth']);
				$address = trim($_POST['address']);
				$country = trim($_POST['country']);
				$fullname = trim($_POST['fullnameAuth']);
				$age = trim($_POST['age']);

				if ($username != '' && $password != '' && $email != '') {
					$user = new User();
					$user->setAttributes($username, $password, $fullname, $email, $country, $address, $age);
					$user->newUser();
				}

				break;
		
			default:
				break;
		}
	}

	require_once("default.php");

?>
