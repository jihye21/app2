<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'root';
		$pw = '1234';
		$dbName = 'ex2';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_email = $_POST['email'];
	    $member_pw_1 = $_POST['pw'];
	    $member_name = $_POST['name'];

		$sql = "insert into member (
				member_email,
				member_pw,
				member_name
		)";
		
		$sql = $sql. "values (
				'$member_email',
				'$member_pw',
				'$member_name'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("success inserting")</script>'; 
		}else{ 
		  echo '<script>alert("fail to insert sql")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "Login.html";
</script>

</html>