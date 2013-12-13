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
		?>
	</head>
	<body>

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
		<form>
		</form>
	</div>

	<div style="margin-top: 40px">
	<a href="default.php">
		Home
	</a>
	&nbsp;>>&nbsp; 
	<a>
		<?php echo $_GET["category_explicit"]; ?>
	</a>
	&nbsp;>>&nbsp; 
	<?php echo $_GET["title"]; ?>
	<br />
	<table border="1" bordercolor="green" width=100%>
		<tr>
			<td>
			<strong><?php echo $title; ?></strong><br \><!-- aici -->
			<a href=<?php echo $url; ?> style="color: black; text-decoration: none;"><?php echo $text_preview; ?><br><img src=<?php echo $img_src; ?> /></a><br \><br \>
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
                <p><font color="black">Parerea autorului :)</font></font></p><!-- aici -->
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
					<table width=100% boarder="1" bordercolor="green"><tr><td>
						<span style="background-color:lime;width=30px;text-align:center" height="20">21</span> <b>Nume Prenume</b><span style="float:right">10/10/2013</span>
						<br \><img src="img/rank6.png" height="20"></img>
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