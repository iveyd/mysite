<?php

	require 'config.php';

	$host 	 =	$config['DB_HOST'];
	$dbname  =	$config['DB_NAME'];
	$usr 	 =	$config['DB_USERNAME'];
	$pswrd	 = 	$config['DB_PASSWORD'];

	$courses = [];
	$students = [];

	try {
	    $conn = new PDO("mysql:host=$host;dbname=$dbname", $usr,$pswrd);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare("INSERT INTO `courses` (`crn`,`prefix`,`num`,`title`) VALUES (:crn, :prefix, :num, :title)");
	    $stmt->bindParam(":crn", $crn);
	    $stmt->bindParam(":prefix", $prefix);
	    $stmt->bindParam(":num", $num);
	    $stmt->bindParam(":title", $title);

	    for ($count = 0; $count < 10; ++$count) {
			// insert a row
		    $crn = (int)str_pad((string)rand(0,999999), 6, "0", STR_PAD_LEFT);
		    array_push($courses, $crn);
		    $prefix = "CSCI";
		    $num = (int)('4'.$count."10");
		    $title = "Computer Science ".($count+1);
		    $stmt->execute();
		}

		$stmt = $conn->prepare("INSERT INTO `students` (`rin`,`rcsID`,`firstname`,`lastname`,`alias`, `phone`) VALUES (:rin, :rcsID, :firstname, :lastname, :alias, :phone)");
	    $stmt->bindParam(":rin", $rin);
	    $stmt->bindParam(":rcsID", $rcsID);
	    $stmt->bindParam(":firstname", $firstname);
	    $stmt->bindParam(":lastname", $lastname);
	    $stmt->bindParam(":alias", $alias);
	    $stmt->bindParam(":phone", $phone);

	    for ($count = 0; $count < 10; ++$count) {
			// insert a row
		   $rin = (int)str_pad((string)rand(0,99999999), 8, "0", STR_PAD_LEFT);
		   array_push($students, $rin);
		   $firstname = "John";
		   $lastname = "smith";
		   if ($count > 0) {
		   	$rcsID = substr($lastname,0,5).$firstname{0}.$count;
		   } else {
		   	$rcsID = "smithj";
		   }
		   $alias = "js".$count;
		   $phone = (int)str_pad((string)rand(), 10, "0", STR_PAD_RIGHT);
		   $stmt->execute();
		}


		$stmt = $conn->prepare("INSERT INTO `grades` (`crn`,`rin`,`grade`) VALUES (:crn, :rin, :grade)");
		$stmt->bindParam(":crn", $crn);
	    $stmt->bindParam(":rin", $rin);
	    $stmt->bindParam(":grade", $grade);

	    for ($count = 0; $count < 25; ++$count) {
			// insert a row
			$ran = rand(0, sizeof($courses)-1);
			$crn = $courses[$ran];
			$ran = rand(0, sizeof($students)-1);
		    $rin = $students[$ran];
		    $grade = rand(0, 100);
		    $stmt->execute();
		}


	    echo "Inserted successfully"; 

	} catch(PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
    }

?>