<?php
class Database {
	
	public static $host = "localhost";
	public static $dbName = "turnovo";
	public static $username = "root";
	public static $password = "";
	
	private static function connect(){
		$checkIfDbExists = new PDO("mysql:host=".self::$host.";charset=utf8", self::$username, self::$password);
		$checkIfDbExists->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$findDb = $checkIfDbExists->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'turnovo'");
		$exists = $findDb->fetchColumn();
		if($exists=="0"){
			$checkIfDbExists->query("CREATE DATABASE IF NOT EXISTS turnovo");
			$checkIfDbExists->query("use turnovo");
				$sql = "CREATE TABLE products (
					id INT(250) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
					name VARCHAR(250) NOT NULL,
					description LONGTEXT NULL,
					price DECIMAL(50,0) NULL,
					image VARCHAR(250) NULL
				)";
			$checkIfDbExists->exec($sql);
		}
		$pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function selectAll($select, $params ){
		
		$statement = self::connect()->prepare($select);
		$query = $statement->execute($params);
		$fetchAll = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $fetchAll;
	}
	public static function selectOne($select, $params ){
		$statement = self::connect()->prepare($select);
		$query = $statement->execute($params); 
		$row = $statement->fetch();
		return $row;
	}
	
	public static function execute($insert, $params){
		$statement = self::connect()->prepare($insert);
		$statement->execute($params);
	}
	
}
?>