<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );

	class ArticleManager {
		public $articlesList = array();

		public function __constructor() {

		}

		public function __destructor() {

		}

		public function getArticlesList() {
			$query = "SELECT * FROM ftwarticles;";

			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
				$article = new Article();
				$article->setSavedAttributes($row['article_link'], $row['url_image'], $row['article_review'], $row['article_subject'], $row['article_categoryid'], $row['article_authorid'], $row['article_date'], $row['article_rating'], $row['articleid'], $row['article_body']);
				$article->getCategory();
				$article->getAuthor();

				$articlesList[] = $article;
			}

			return $articlesList;
		}
	}
?>
