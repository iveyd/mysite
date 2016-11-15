<?php

	include 'output.php';

  $err = Array();

  require 'config.php';

	$host 	 =	$config['DB_HOST'];
	$dbname  =	$config['DB_NAME'];
	$usr 	 	 =	$config['DB_USERNAME'];
	$pswrd	 = 	$config['DB_PASSWORD'];

  try {

  	$conn = new PDO("mysql:host=$host;dbname=$dbname", $usr,$pswrd);
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['create']) && $_POST['create'] == 'CREATE') {
      include 'install.php';
    }

    if (isset($_POST['ins']) && $_POST['ins'] == 'INS') {
   		include 'insert.php';
    }

    if (isset($_POST['output']) && $_POST['output'] == 'OUTPUT') {
      echo students($conn);
    }

    if (isset($_POST['dist']) && $_POST['dist'] == 'DIST') {
    	echo gradeDist($conn);
    }
  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>David Ivey - Lab 9</title>
</head>

<body>
	<form method="post" action="index.php">
      <input type="submit" name="create" value="CREATE"/>  
      <input type="submit" name="ins" value="INS"/> 
      <input type="submit" name="output" value="OUTPUT"/> 
      <input type="submit" name="dist" value="DIST"/> 
      </form>
</body>

</html>