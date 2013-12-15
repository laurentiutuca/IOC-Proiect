<?php
	include "config.php";
	include "classes/User.php";
	include "classes/Article.php";
	include "classes/ArticleCategory.php";

	require_once 'variables.php';
	require_once 'functions.php';

	if (isset($_POST['actionindex']) || isset($_GET['actionindex'])) {
		$action = isset($_POST['actionindex']) ? $_POST['actionindex'] : $_GET['actionindex'];
		switch($action) {
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
						$_SESSION['login'] = true;
						$_SESSION['userid'] = $user->userid;
						$_SESSION['username'] = $user->username;
					}	
				}

				require_once("default.php");
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

				require_once("default.php");
				break;

			case "logout":
				if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
					unset($_SESSION['login']);
				}

				require_once("default.php");
				break;

			case "addarticle":
				require_once("newarticle.php");
				break;

			case "submitarticle":
				if (isset($_POST['title']) && isset($_POST['url'])) {
					$article = new Article();
					$category = new ArticleCategory();
					$categories = $category->getCategories();

					if ($_POST['selectedcategory'] == count($categories) + 1) {
						$category->addCategory($_POST['inputcategory']);
					}
					$nrcategories = $_POST['selectedcategory'];

					$article->setAttributes($_POST['url'], $_POST['url_image'], $_POST['feedback'], $_POST['title'], $nrcategories, $_SESSION['userid']);

					$article->getArticleViaCurl();

					$article->addArticle();
					require_once("default.php");
				}
				break;

			default:
				require_once("default.php");				
				break;
		}
	} else {
		require_once("default.php");
	}
?>
