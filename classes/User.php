<?php
	require_once( dirname(dirname(__FILE__)) . '/config.php' );	

	class User {
		public $userid;
		public $username;
		public $password;
		public $passwordHash;
		public $fullname;
		public $email;
		public $country;
		public $address;
		public $age;
		
		public function __constructor() {

		}

		public function __destructor() {

		}

		public function setAttributes($username = false, $password = false, $fullname = false, $email = false, $country = false, $address = false, $age = false) {
			$this->username = $username;
			$this->password = $password;
			$this->email = $email;
			$this->fullname = $fullname;
			$this->country = $country;
			$this->address = $address;
			$this->age = $age;
		}

		public function newUser() {
			$query = "INSERT into ftwusers (username, user_fullname, user_email, user_passwordhash, user_country, user_address, user_age, user_rating, user_typeid, user_sessions) VALUES ('" . $this->username . "', '" . $this->fullname . "', '" . $this->email . "', '" . md5($this->password) . "', '" . $this->country . "', '" . $this->address . "', " . $this->age . ", 0, 1, 0);";

			mysql_query( $query ) or die(mysql_error());
		}

		public function login() {
			$query = "SELECT * FROM ftwusers WHERE username = '" . $this->username . "' AND user_passwordhash='" . md5($this->password) . "';";

			$result = mysql_query($query);

			$row = mysql_fetch_array($result);
			if ($row) {
				$this->userid = $row['userid'];

				return true;
			}

			return false;
		}
	}
?>
