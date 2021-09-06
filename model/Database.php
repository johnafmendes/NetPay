<?php
class Database{
	private static $host;
	private static $db_name;
	private static $username;
	private static $password;
	
	public function __construct(){
		self::$host = "127.0.0.1";
		self::$db_name = "mydb";
		self::$username = "root";
		self::$password = "root";
	}
	
	// get the database connection
	public static function getConnection(){	
		$conn = null;
		try{
			$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8", self::$username, self::$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Connection error: " . $e->getMessage();
		}
		
		return $conn;
	}
	
}
?>