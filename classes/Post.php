<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );

	class Post {
		public $postid;
		public $authorid, $author, $author_rating;
		public $body;
		public $articleid;
		public $date;
		public $rating;

		public function __constructor() {

		}

		public function __destructor() {

		}

		public function setAttributes($authorid, $body, $articleid) {
			$this->articleid = $articleid;
			$this->body = $body;
			$this->authorid = $authorid;
		}

		public function setSavedAttributes($postid, $authorid, $body, $articleid, $date, $rating) {
			$this->postid = $postid;
			$this->authorid = $authorid;
			$this->body = $body;
			$this->articleid = $articleid;
			$this->date = $date;
			$this->rating = $rating;
		}

		public function getAuthor() {
			$query = "SELECT * FROM ftwusers WHERE userid = " . $this->authorid . ";";

			$result = mysql_query($query);

			$row = mysql_fetch_array($result);
			if ($row) {
				$this->author = $row['username'];
				$this->author_rating = $row['user_rating'];
			}
		}

		public function addPost() {
			$query = "INSERT into ftwposts (post_authoid, post_body, post_articleid, post_date) VALUES ('" . $this->authorid . "', '" . $this->body . "', '" . $this->articleid . "', '" . date("F j, Y, g:i a") . "');";

			mysql_query( $query ) or die(mysql_error());
		}
	}
?>
