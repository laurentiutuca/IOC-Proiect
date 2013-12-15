<!DOCTYPE>
<html>
	<head>
		<title>
			Feedback The World
		</title>
		<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
		<meta name = "description" content = "Post aggregator" />
		<link rel = "shortcut icon" type = "image/x-icon" href = "img/favicon.ico" />

		<!-- CSS -->
		<link rel = "stylesheet" href="css/default.css" />
		<link rel = "stylesheet" href="css/rating_stars.css" />

		<!-- Scripts -->
		<script type="text/javascript" language="javascript" src="js/default.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/ratingsys.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/tabcontent.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/default.js">
		</script>

		<!-- PHP requires -->
		<?php
			require 'variables.php';
			require 'functions.php';
			require 'classes/Article.php';
			require 'classes/ArticleManager.php';
			require 'classes/Post.php';
			require 'classes/PostManager.php';
		?>
	</head>
	<body>

	<?php
		// check post submit action
		if (isset($_POST['actionindex']) || isset($_GET['actionindex'])) {
			$action = isset($_POST['actionindex']) ? $_POST['actionindex'] : $_GET['actionindex'];
			switch($action) {
				case "addpost":
					$articleid = $_POST['postindex'];
					$postbody = $_POST['post'];
					$authorid = $_SESSION['userid'];

					$post = new Post();
					$post->setAttributes($authorid, $postbody, $articleid);
					$post->addPost();
					include "article.php?articleid=" . $articleid;
					break;
				default:
					break;
			}
		}

		// get posts list for this article
		$postManager = new PostManager();
		$postList = $postManager->getPostsList($_GET['articleid']);
	?>
		

	<!-- Facebook -->
	<div id="fb-root">
	</div>

	<!-- Green header -->
	<div id = "greenbar">
		<a href = "http://andreip.ro/FeedbackTheWorld/default.php">
			<img id = "logo_img" src = "img/favicon.png" />
			<div id = "logo_text">
					Feedback The World
			</div>
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

	<?php
		$articleManager = new ArticleManager();
		$article = $articleManager->getArticle($_GET['articleid']);
	?>

	<div style="margin-top: 40px">
	<a href="default.php">
		Home
	</a>
	&nbsp;>>&nbsp; 
	<a>
		<?php echo $article->category; ?>
	</a>
	&nbsp;>>&nbsp; 
	<?php echo $article->subject; ?>
	<br />
	<table border="1" bordercolor="green" width=100%>
		<tr>
			<td>
			<strong><?php echo $article->subject; ?></strong><br \><!-- aici -->
			<a href="<?php echo $article->link; ?>" style="color: black; text-decoration: none;"><?php echo $article->body; ?><br><img src="<?php echo $article->url_image; ?>" /></a><br \><br \>
			</td>
		</tr>
	</table>
	<br \>
    <div style="width: 100%; margin: 0 auto;">
        <ul class="tabs" data-persist="true">
            <li><a href="#authoropinion">Author opinion</a></li>
            <li><a href="#useropinion">Users opinion</a></li>
            <li><a href="#ftwresults">FtW results</a></li>
        </ul>
        <div class="tabcontents">
            <div id="authoropinion">
		<span style="background-color:lime;width=30px;text-align:center" height="20"><?php echo $article->rating?></span> <b><?php echo $article->author; ?></b><span style="float:right"><?php echo $article->date; ?></span>
                <p><font color="black"><?php echo $article->review; ?></font></p><!-- aici -->
				<div align="left" style="height:30px">
					<span id="rateStatus">Rate this comment</span>
					<span id="ratingSaved">Rating Saved!</span>
					<div id="rateMe" title="Rate this comment" align="right" height="50">
						<a onclick="rateIt(this)" id="_1" title="meh" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_2" title="Not Bad" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_3" title="Pretty Good" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_4" title="Very good" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_5" title="Excellent" onmouseover="rating(this)" onmouseout="off(this)"></a>
						<a onclick="rateIt(this)" id="_6" title="I love it" onmouseover="rating(this)" onmouseout="off(this)"></a>
					</div>
				</div>
                
            </div>
            <div id="useropinion">
				<ul class="tabs" data-persist="true">
				<li><a href="#mostrecent">Most recent</a></li>
				<li><a href="#ftwrating">FtW rating</a></li>
				</ul>
				<div class="tabcontents">
					<div id="mostrecent">
					<?php $i = 0;
						for ($i = 0; $i < count($postList); $i++) { 
					?>
					<table width=100% boarder="1" bordercolor="green">
					<tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20"><?php echo $postList[$i]->author_rating; ?></span> <b><?php echo $postList[$i]->author; ?></b><span style="float:right"><?php echo $postList[$i]->date; ?></span>
						<br \><img src="img/rank6.png" height="20"></img>
						<p><font color="black"><?php echo $postList[$i]->body; ?></font></p>
						<p>
							<span style="text-align:right">
							<font color="green">
								<form style="text-align:right"><input type="radio" name="agree" value="yes">I agree<input type="radio" name="agree" value="no">I don't agree</form>
							</font>
							</span>
							<span style="float:left">
							<a href=# style="color:green">All this author posts</a> | <a href=# style="color:green">Read full post</a>
							</span>
						</p>
					</td></tr></table><br>
					<?php } ?>
					<table width=100% boarder="1" bordercolor="green"><tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20"><?php echo $_SESSION['rating']; ?></span> <b><?php echo $_SESSION['username']; ?></b><span style="float:right"><?php echo date("F j, Y, g:i a"); ?></span>
						<br \>
						<form method="post" class="addpost_form" action="article.php">
							<input type="hidden" name="actionindex" value="addpost" />
							<input type="hidden" name="postindex" value="<?php echo $article->articleid; ?>" />	
							<label class="article_form">
								<span><font color="black">Post a comment</font></span><br>
								<textarea class="post_forminput" id="post" name="post" value="" type="text" placeholder="Add comment" rows="5" columns="40"></textarea>
							</label>
							<button class="article_formalign article_submitbtn" type="submit">Submit</button>
						</form>
					</td></tr></table>
					</div>
					<div id="ftwrating">
						<table width=100% boarder="1" bordercolor="green"><tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20">21</span> <b>Nume Prenume</b><span style="float:right">10/10/2013</span>
						<br \><img src="img/rank10.png" height="20"></img>
						<p><font color="black">Eu cred ca pitong</font></p>
						<p>
							<span style="text-align:right">
							<font color="green">
								<form style="text-align:right"><input type="radio" name="agree" value="yes">I agree<input type="radio" name="agree" value="no">I don't agree</form>
							</font>
							</span>
							<span style="float:left">
							<a href=# style="color:green">All this author posts</a> | <a href=# style="color:green">Read full post</a>
							</span>
						</p>
					</td></tr></table>
					</div>
				</div>              
            </div>
            <div id="ftwresults">
                <b>Conclusion</b>
                <p><img src="img/approved.jpg"></img></p>
            </div>
        </div>
    </div>
	</body>
</html>
