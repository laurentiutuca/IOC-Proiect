<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );	

	class Category {
		public $categoryid;
		public $name;
		public $date;

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
	}
?>
