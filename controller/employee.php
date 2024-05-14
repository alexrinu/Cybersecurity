<?php
session_start();
if (!isset($_SESSION["loggedIn_employee"])) {
    header("Location: /start.html");
    exit();
}

$db = new PDO("mysql:host=localhost;dbname=programare_inmatriculari", "root", "root");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = isset($_GET['name']) ? $_GET['name'] : '';

?>
<html>
    <head>
    	<title>Update an appointments</title>
    	<link href="/view/layout.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>Programari Inmatriculari DRPCIV</h1>
		<h2>Input user's name to search appointments:</h2>
		<form action="" method="get"> 
			<input type="text" name="name"> 
			<input type="submit"> 
		</form>

        <h2><?= $name ?></h2>
		<table>
			<tr><th>Appointment id</th><th>Location name</th><th>Date</th></tr>
			<?php
			  if ($name !== '') {
			      $stmt = $db->prepare("SELECT a.id, l.name, a.data
			          FROM users u
			          JOIN appointments a ON a.user_id = u.id
			          JOIN locations l ON a.location_id = l.id
			          WHERE u.name = :name");
			      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
			      $stmt->execute();
			      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			      foreach ($rows as $row) {
			        	echo "<tr>
						  <td>" . htmlspecialchars($row['id']) . "</td>
						  <td>" . htmlspecialchars($row['name']) . "</td>
						  <td>" . htmlspecialchars($row['data']) . "</td>
						</tr>";
				   }
			  }
			?>
		</table>
		<a href="/view/addAppointment.html">Add Appointment</a><br>
		<a href="/view/editAppointment.html">Edit Appointment</a><br>
		<a href="/view/removeUser.html">Remove User</a><br>
		<a href="/controller/logout.php">Logout</a>
	</body>
</html>
