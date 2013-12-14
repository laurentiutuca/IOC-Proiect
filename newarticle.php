<?php
	require_once('variables.php');
	require_once('functions.php');

	include "config.php";
	include "classes/Category.php";
?>

<!DOCTYPE>
<html>
	<head>
		<title>
			Feedback The World
		</title>
		<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
		<meta name = "description" content = "Post aggregator" />
		<link rel = "shortcut icon" type = "image/x-icon" href = "img/favicon.ico" />
		<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />		
		<!-- CSS -->
		<link rel = "stylesheet" href = "css/default.css" />

		<!-- Scripts -->
		<script type="text/javascript" language="javascript" src = "js/default.js">
		</script>
	</head>
	<body>

		<!-- Facebook -->
		<div id="fb-root">
		</div>

		<!-- Green header -->
		<div id="greenbar">
			<a href="http://andreip.ro/FeedbackTheWorld/default.php">
				<img id = "logo_img" src = "img/favicon.png" />
				<div id = "logo_text">Feedback The World</div>
			</a>

			<?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
				<div class="btn-sign">
					<a href="index.php?actionindex=logout" class="logout_option">Logout</a>
        			</div>
				<div class="btn-sign">
					<a href="index.php?actionindex=addarticle" class="article_option">Add article</a>
        			</div>
			<?php } else {?>		
				<div class="btn-sign">
					<a href="#login-box" class="login-window">Login / Sign Up</a>
        			</div>
			<?php } ?>
		</div>
		<center>
			<div class="addarticle_body">
				<form method="post" class="addarticle_form" action="index.php">
					<input type="hidden" name="actionindex" value="submitarticle" />
					<input type="hidden" name="selectedcategory" id="selectedcategory" value="" />

					<label class="articletitle">
						<span class="article_header">Add an article on FeedbackTheWorld</span>
					</label>		
					<label class="article_form">
						<span class="article_formalign">Title/Subject</span><br>
						<input id="articletitle" name="title" value="" type="text" placeholder="Title" class="article_formalign inputfield">
					</label>
					<label class="article_form">
						<span class="article_formalign">Select a category</span><br>
						<?php
							$category = new Category();
							$categories = $category->getCategories();
						?>
						<select id="selectcategory" name="selectcateg" class="article_formalign inputfield" onchange="checkvalues('<?php echo count($categories); ?>');">
							<option value="0">No category selected</option>
							<?php
								$i = 0;
								for ($i = 0; $i < count($categories); $i++) {
									?><option value="<?php echo i+1; ?>"><?php echo $categories[$i]; ?></option><?php
								}
								?><option value="<?php echo count($categories) + 1; ?>">Add new category</option><?php
							?>
						</select>
						<div id="newcategoryinp"></div>						
					</label>
					<label class="article_form">
						<span class="article_formalign">URL to where you found the article</span><br>
						<input class="article_formalign inputfield" id="url" name="url" value="" type="text" placeholder="URL">
					</label>

					<label class="article_form">
						<span class="article_formalign">URL to an image</span><br>
						<span class="article_formalign">(Right click on original image and Copy here link address)</span>
						<input class="article_formalign inputfield" id="url_image" name="url_image" value="" type="text" placeholder="URL">
					</label>

					<label class="article_form">
						<span class="article_formalign">Your feedback</span><br>
						<textarea class="article_formalign inputfeedback" id="feedback" name="feedback" value="" type="text" placeholder="Feedback" rows="100" columns="40"></textarea>
					</label>

					<button class="article_formalign article_submitbtn" type="submit">Submit</button>
				</form>
			</div>
		</center>
	</body>
</html>

<script>

function checkvalues(selectTotal) {
	var e = document.getElementById("selectcategory");
	var strCategory = e.selectedIndex;	
	if (parseInt(strCategory) == parseInt(selectTotal) + 1) {
		var inputElement = document.createElement("input");
		inputElement.className = "article_formalign inputfield newctg";
		inputElement.id = "newCategory";
		inputElement.placeholder = "New category";
		inputElement.type = "text";
		document.getElementById("newcategoryinp").appendChild(inputElement);
	}

	document.getElementById('selectedcategory').value = strCategory;
}

</script>
