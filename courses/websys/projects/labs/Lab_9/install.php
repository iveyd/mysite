<?php

	require 'config.php';

	$host 	 =	$config['DB_HOST'];
	$usr 	 =	$config['DB_USERNAME'];
	$pswrd	 = 	$config['DB_PASSWORD'];


	try {
	    $conn = new PDO("mysql:host=$host;", $usr,$pswrd);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $sql = "CREATE DATABASE IF NOT EXISTS `iveyd-websyslab9`";
	    $conn->exec($sql);

	    $sql = "ALTER DATABASE `iveyd-websyslab9` CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	    $conn->exec($sql);

	    $sql = "use `iveyd-websyslab9`";
	    $conn->exec($sql);

	    $sql = "CREATE TABLE IF NOT EXISTS `courses` (
	                crn int(11),
	                prefix varchar(4) NOT NULL,
					num smallint(4) NOT NULL,
					title varchar(255) NOT NULL,
					PRIMARY KEY (crn))";
	    $conn->exec($sql);

	    $sql = "ALTER TABLE `courses` CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	    $conn->exec($sql);

	    $sql = "CREATE TABLE IF NOT EXISTS `students` (
	                rin int(9) PRIMARY KEY,
	                rcsID char(7) NOT NULL,
					firstname varchar(100) NOT NULL,
					lastname varchar(100) NOT NULL,
					alias varchar(100) NOT NULL,
					phone int(10))";
	    $conn->exec($sql);

	    $sql = "ALTER TABLE `students` CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	    $conn->exec($sql);

	    $sql = "CREATE TABLE IF NOT EXISTS `grades` (
	                id int AUTO_INCREMENT,
	                crn int(11),
					rin int(9),
					grade int(3) NOT NULL,
					PRIMARY KEY (id),
					FOREIGN KEY (crn) REFERENCES courses(crn),
					FOREIGN KEY (rin) REFERENCES students(rin))";
	    $conn->exec($sql);

		$sql = "ALTER TABLE `grades` CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	    $conn->exec($sql);

	    // $sql = "DROP DATABASE `iveyd-websyslab9`";
	    // $conn->exec($sql);

	    echo "DB created successfully";

	}
	catch(PDOException $e)
	{
	    echo $sql . "<br>" . $e->getMessage();
	}
?>