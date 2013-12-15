<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );
	include "Category.php";	

	class Article {
		public $articleid;
		public $author, $authorid;
		public $subject;
		public $body;
		public $review;
		public $link;
		public $date;
		public $category, $categoryid;
		public $rating;
		public $url_image;

		public function __constructor() {

		}

		public function __destructor() {

		}

		public function setAttributes($link, $url_image, $feedback, $title, $selectcateg, $userid) {
			$this->link = $link;
			$this->url_image = $url_image;
			$this->review = $feedback;
			$this->subject = $title;
			$this->categoryid = (int)$selectcateg;
			$this->authorid = $userid;
		}

		public function getCategory() {
			$query = "SELECT * FROM ftwcategories WHERE categoryid = " . $this->categoryid . ";";

			$result = mysql_query($query);

			$row = mysql_fetch_array($result);
			if ($row) {
				$this->category = $row['category_name'];
			}
		}

		public function setSavedAttributes($link, $url_image, $feedback, $title, $selectcateg, $userid, $date, $rating, $articleid, $articlebody) {
			$this->link = $link;
			$this->url_image = $url_image;
			$this->review = $feedback;
			$this->subject = $title;
			$this->categoryid = (int)$selectcateg - 1;
			$this->authorid = $userid;
			$this->date = $date;
			$this->rating = $rating;
			$this->articleid = $articleid;
			$this->body = $articlebody;			
		}

		public function getAuthor() {
			$query = "SELECT * FROM ftwusers WHERE userid = " . $this->authorid . ";";

			$result = mysql_query($query);

			$row = mysql_fetch_array($result);
			if ($row) {
				$this->author = $row['username'];
			}
		}

		public function getArticleViaCurl() {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->link);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			$data = curl_exec($ch);
			$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);

			$doc = new DOMDocument();
			$doc->loadHTML($data);

			foreach( $doc->getElementsByTagName('meta') as $meta ) { 
				if (strcmp($meta->getAttribute('property'), "og:description") == 0) {
   				$metaData[] = array(
        				'property' => $meta->getAttribute('property'),
        				'content' => $meta->getAttribute('content')
    				);
				}
			}

			$this->body = $metaData[0]['content'];
		}

		function addArticle() {
			$query = "INSERT into ftwarticles (article_authorid, article_subject, article_body, article_review, article_link, article_date, article_categoryid, url_image) VALUES ('" . $this->authorid . "', '" . $this->subject . "', '" . $this->body . "', '" . $this->review . "', '" . $this->link . "', '" . date("F j, Y, g:i a") . "', " . $this->categoryid . ", '" . $this->url_image . "');";

			mysql_query( $query ) or die(mysql_error());
		}
	}

?>
