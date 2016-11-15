<?php

	function students($conn) {
		try {
			$stmt = $conn->prepare("SELECT * FROM `students` WHERE 1 ORDER BY `lastname`,`firstname`"); 
	    	$stmt->execute();
		    // set the resulting array to associative
	    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	    	$stmt->fetchAll();

		} catch(PDOException $e) {
   			echo "Error: " . $e->getMessage();
		}

	}

	function gradeDist($conn) {
		$sql = "SELECT `rin` FROM `grades` WHERE 1";
	    return $conn->exec($sql);
	}




 ?>