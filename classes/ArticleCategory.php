<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );	

	class ArticleCategory {
		public $categoryid;
		public $category_name;
		public $category_date;

		public $categories = array();

		public function __constructor() {

		}

		public function __destructor() {

		}

		public function getCategories() {
			$query = "SELECT * FROM ftwcategories;";

			$result = mysql_query($query);

			while ($row = mysql_fetch_array($result)) {
				$categories[] = $row['category_name'];
			}

			return $categories;
		}

		public function addCategory($category_name) {
			$query = "INSERT into ftwcategories (category_name, category_date) VALUES ('" . $category_name . "', '" . date("F j, Y, g:i a") . "');";

			mysql_query( $query ) or die(mysql_error());
		}
	}	
?>
