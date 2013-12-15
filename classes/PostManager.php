<?php
	require_once(dirname(dirname(__FILE__)) . '/config.php');

	class PostManager {
		public $posts = array();

		public function __constructor() {

		}

		public function __destructor() {

		}

		public function getPostsList($articleid) {
			$query = "SELECT * FROM ftwposts WHERE post_articleid = " . $articleid . ";";

			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
				$post = new Post();
				$post->setSavedAttributes($row['postid'], $row['post_authoid'], $row['post_body'], $row['post_articleid'], $row['post_date'], $row['post_rating']);
				$post->getAuthor();
				$posts[] = $post;
			}

			return $posts;
		}
	}
?>
