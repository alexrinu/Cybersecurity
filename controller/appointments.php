<?php
  session_start();
?>
<html>
	<head>
		<title>Programari Inmatriculari DRPCIV</title>
		<link href="/view/layout.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>Programari Inmatriculari DRPCIV</h1>
		<h2>Your appointments:</h2>
		<table>
			<tr><th>Location name</th><th>Data</th></tr>
			<?php
			  $name = $_SESSION["name"];
			  $query = "SELECT l.name, a.data
			          FROM users u
			          JOIN appointments a ON a.user_id = u.id
			          JOIN locations l ON l.id = a.location_id
			          WHERE u.name = '$name'";
			  $db = new PDO("mysql:dbname=programare_inmatriculari", "root", "root");
			  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  $rows = $db->query($query);
			  foreach ($rows as $row) {
			    	?>
				    <tr>
					  <td>
					    	<?= $row["name"] ?>
					  </td>
					  <td>
					    	<?= $row["data"] ?>
					  </td>
				    </tr>
   		    <?php		
			   }
			?>
		</table>
		<form action="/controller/upload.php" method="post" enctype="multipart/form-data">
        Upload your car documents here:
        <input type="file" name="fileToUpload" id="fileToUpload">
    	<input type="submit" value="Upload" name="submit">
		</form>
		<a href="/controller/logout.php">Logout</a>
	</body>
</html>
