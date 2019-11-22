<?php	
	class DBConfig {
		public static $DB_SERVER_NAME = "localhost";
		public static $DB_DATABASE_NAME = "zoomdesk";
		public static $DB_USER = "root";
		public static $DB_PASSWORD = "dkx001";
		public static $conn;
		public static function connectDatabase(){
			$conn = mysqli_connect(self::$DB_SERVER_NAME, self::$DB_USER, self::$DB_PASSWORD, self::$DB_DATABASE_NAME);
			if($conn->connect_error) return false;
			return $conn;
		}
	}	
	DBConfig::$conn = DBConfig::connectDatabase();